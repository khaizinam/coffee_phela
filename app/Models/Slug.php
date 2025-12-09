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
        if ($this->prefix) {
            $prefix = rtrim($this->prefix, '/');
            return $prefix . '/' . $this->key;
        }
        // Prefix = null, chỉ trả về /key
        return '/' . $this->key;
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

        // Entity có thể là full class name (App\Models\Page) hoặc short name (Page)
        $modelClass = $slug->entity;
        
        // Nếu không phải full class name, thử thêm namespace
        if (!class_exists($modelClass) && !str_contains($modelClass, '\\')) {
            $modelClass = 'App\\Models\\' . $modelClass;
        }
        
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
        // Entity có thể là full class name (App\Models\Page) hoặc short name (Page)
        $modelClass = $this->entity;
        
        // Nếu không phải full class name, thử thêm namespace
        if (!class_exists($modelClass) && !str_contains($modelClass, '\\')) {
            $modelClass = 'App\\Models\\' . $modelClass;
        }
        
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

    /**
     * Get the entity model instance (accessor)
     */
    public function getEntityAttribute($value)
    {
        // Nếu value là tên class, trả về class name
        if (is_string($value)) {
            return $value;
        }
        return $value;
    }

    /**
     * Get entity model instance
     */
    public function entity()
    {
        // Entity có thể là full class name (App\Models\Page) hoặc short name (Page)
        $modelClass = $this->entity;
        
        // Nếu không phải full class name, thử thêm namespace
        if (!class_exists($modelClass) && !str_contains($modelClass, '\\')) {
            $modelClass = 'App\\Models\\' . $modelClass;
        }
        
        if (!class_exists($modelClass)) {
            return null;
        }

        return $modelClass::find($this->entity_id);
    }
}
