<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'file_name',
        'file_path',
        'url',
        'thumb_url',
        'mime_type',
        'size',
        'width',
        'height',
        'alt_text',
        'description',
        'status',
    ];

    protected $casts = [
        'size' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
    ];

    /**
     * Get all entities that use this gallery item.
     */
    public function entities()
    {
        return $this->hasMany(GalleryEntity::class);
    }

    /**
     * Scope a query to only include active galleries.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get the full URL for the image.
     * Converts relative path to full URL.
     */
    public function getFullUrlAttribute(): string
    {
        // If URL already contains http/https, return as is (backward compatibility)
        if (str_starts_with($this->url, 'http://') || str_starts_with($this->url, 'https://')) {
            return $this->url;
        }
        
        // If URL starts with /, use it directly with asset() or just return as is
        // asset() will handle paths starting with / correctly
        if (str_starts_with($this->url, '/')) {
            return asset($this->url);
        }
        
        // Convert relative path to full URL
        return asset('/' . ltrim($this->url, '/'));
    }

    /**
     * Get the full URL for the thumbnail.
     * Converts relative path to full URL.
     */
    public function getFullThumbUrlAttribute(): string
    {
        if (!$this->thumb_url) {
            return $this->full_url;
        }
        
        // If URL already contains http/https, return as is (backward compatibility)
        if (str_starts_with($this->thumb_url, 'http://') || str_starts_with($this->thumb_url, 'https://')) {
            return $this->thumb_url;
        }
        
        // If URL starts with /, use it directly with asset()
        if (str_starts_with($this->thumb_url, '/')) {
            return asset($this->thumb_url);
        }
        
        // Convert relative path to full URL
        return asset('/' . ltrim($this->thumb_url, '/'));
    }
}
