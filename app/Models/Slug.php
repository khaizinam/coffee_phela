<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    use HasFactory;

    protected $fillable = [
        'entity',
        'entity_id',
        'key',
        'prefix',
    ];

    /**
     * Get the full URL path with prefix
     */
    public function getFullPathAttribute(): string
    {
        $prefix = $this->prefix ? rtrim($this->prefix, '/') : '';
        return $prefix . '/' . $this->key;
    }

    /**
     * Find slug by key and prefix
     */
    public static function findByKey(string $key, ?string $prefix = null)
    {
        return static::where('key', $key)
            ->where('prefix', $prefix)
            ->first();
    }

    /**
     * Find entity by slug
     */
    public static function findEntityBySlug(string $key, ?string $prefix = null)
    {
        $slug = static::findByKey($key, $prefix);
        
        if (!$slug) {
            return null;
        }

        $modelClass = 'App\\Models\\' . $slug->entity;
        
        if (!class_exists($modelClass)) {
            return null;
        }

        return $modelClass::find($slug->entity_id);
    }

    /**
     * Get the entity model instance
     */
    public function getEntity()
    {
        $modelClass = 'App\\Models\\' . $this->entity;
        
        if (!class_exists($modelClass)) {
            return null;
        }

        return $modelClass::find($this->entity_id);
    }

    /**
     * Get entity name for display
     */
    public function getEntityNameAttribute(): string
    {
        return class_basename($this->entity);
    }
}
