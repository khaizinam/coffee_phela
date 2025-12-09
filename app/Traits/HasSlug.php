<?php

namespace App\Traits;

use App\Models\Slug;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

trait HasSlug
{
    /**
     * Get the slug for this model
     */
    public function slug()
    {
        return $this->hasOne(Slug::class, 'entity_id')
            ->where('entity', static::class);
    }

    /**
     * Generate unique slug key with auto-increment number if duplicate
     * Unique constraint: key + prefix (kể cả prefix = null)
     */
    protected function generateUniqueSlugKey(string $baseKey, ?string $prefix = null): string
    {
        $prefix = $prefix ?? $this->getDefaultSlugPrefix();
        $key = $baseKey;
        $counter = 1;

        // Get current slug ID to exclude when updating
        $currentSlugId = null;
        if ($this->exists) {
            $currentSlug = $this->slug()->first();
            if ($currentSlug) {
                $currentSlugId = $currentSlug->id;
            }
        }

        while (true) {
            $query = Slug::where('key', $key);
            
            // Handle prefix: null = null, not null = exact match
            if ($prefix === null) {
                $query->whereNull('prefix');
            } else {
                $query->where('prefix', $prefix);
            }
            
            // Exclude current record if updating
            if ($currentSlugId) {
                $query->where('id', '!=', $currentSlugId);
            }
            
            $exists = $query->exists();

            if (!$exists) {
                return $key;
            }

            // Thêm số tự nhiên với dấu '-'
            $key = $baseKey . '-' . $counter;
            $counter++;
        }
    }

    /**
     * Get or create slug for this model
     */
    public function getSlug(?string $prefix = null): Slug
    {
        $prefix = $prefix ?? $this->getDefaultSlugPrefix();
        $baseKey = $this->generateSlugKey();
        $uniqueKey = $this->generateUniqueSlugKey($baseKey, $prefix);

        return $this->slug()->firstOrCreate(
            [
                'entity' => static::class,
                'entity_id' => $this->id,
            ],
            [
                'key' => $uniqueKey,
                'prefix' => $prefix,
            ]
        );
    }

    /**
     * Update or create slug
     */
    public function updateSlug(?string $key = null, ?string $prefix = null): Slug
    {
        $prefix = $prefix ?? $this->getDefaultSlugPrefix();
        $baseKey = $key ?? $this->generateSlugKey();
        $uniqueKey = $this->generateUniqueSlugKey($baseKey, $prefix);

        return $this->slug()->updateOrCreate(
            [
                'entity' => static::class,
                'entity_id' => $this->id,
            ],
            [
                'key' => $uniqueKey,
                'prefix' => $prefix,
            ]
        );
    }

    /**
     * Generate slug key from model
     * Override this method in your model to customize slug generation
     */
    protected function generateSlugKey(): string
    {
        // Try to get name or title field
        $nameField = $this->name ?? $this->title ?? $this->id;
        return Str::slug($nameField);
    }

    /**
     * Get default slug prefix
     * Override this method in your model to set default prefix
     */
    protected function getDefaultSlugPrefix(): ?string
    {
        return null;
    }

    /**
     * Get full slug path
     */
    public function getSlugPathAttribute(): ?string
    {
        $slug = $this->slug;
        return $slug ? $slug->full_path : null;
    }

    /**
     * Boot the trait
     */
    public static function bootHasSlug()
    {
        // Auto-create slug when model is created (tự động từ name)
        static::created(function ($model) {
            if (method_exists($model, 'getSlug')) {
                $model->getSlug();
            }
        });

        // KHÔNG tự động update slug khi model được updated
        // Slug chỉ update khi user click nút refresh hoặc cập nhật thủ công

        // Auto-delete slug when model is deleted (soft delete)
        static::deleted(function ($model) {
            $slug = $model->slug()->first();
            if ($slug) {
                $slug->delete();
            }
        });

        // Auto-delete slug when model is force deleted
        static::forceDeleted(function ($model) {
            $slug = $model->slug()->withTrashed()->first();
            if ($slug) {
                $slug->forceDelete();
            }
        });
    }
}

