<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Traits\HasSlug;

class Page extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $fillable = [
        'name',
        'meta_title',
        'meta_description',
        'meta_image',
        'meta_keywords',
        'banner_image',
        'template',
        'status',
    ];

    /**
     * Generate slug key from name
     */
    protected function generateSlugKey(): string
    {
        return Str::slug($this->name ?? $this->id);
    }

    /**
     * Get default slug prefix for pages
     * Prefix = null để phù hợp SEO (slug trực tiếp: /ten-trang)
     */
    protected function getDefaultSlugPrefix(): ?string
    {
        return null;
    }

    /**
     * Scope a query to only include active pages.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get the full URL for banner image
     */
    public function getBannerImageUrlAttribute(): ?string
    {
        if (!$this->banner_image) {
            return asset('img/new/banner-3.webp');
        }

        return asset('storage/' . $this->banner_image);
    }
}
