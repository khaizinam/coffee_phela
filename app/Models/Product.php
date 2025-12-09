<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Traits\HasSlug;

class Product extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasSlug;

    protected $fillable = [
        'name',
        'description',
        'content',
        'price',
        'image',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * Get the categories that belong to the product.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product')
                    ->withTimestamps();
    }

    /**
     * Get galleries attached to this product.
     */
    public function galleries()
    {
        return $this->morphMany(GalleryEntity::class, 'entity')
                    ->with('gallery')
                    ->orderBy('sort_order');
    }

    /**
     * Get gallery images for specific collection.
     */
    public function getGalleryImages(?string $collection = null)
    {
        $query = $this->galleries()->whereHas('gallery', function ($q) {
            $q->where('status', 'active');
        });
        
        if ($collection) {
            $query->where('collection', $collection);
        }
        
        return $query->get()->pluck('gallery');
    }

    /**
     * Scope a query to only include published products.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope a query to only include active products.
     */
    public function scopeActive($query)
    {
        return $query->where('status', '!=', 'unactive');
    }

    /**
     * Register media collections.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
            ->singleFile(false);
        
        $this->addMediaCollection('thumbnail')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
            ->singleFile();
    }

    /**
     * Register media conversions.
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(300)
            ->sharpen(10)
            ->optimize();
        
        $this->addMediaConversion('medium')
            ->width(800)
            ->height(800)
            ->optimize();
    }

    /**
     * Get gallery images URLs.
     */
    public function getGalleryImagesAttribute()
    {
        return $this->getMedia('gallery')->map(function ($media) {
            return $media->getUrl();
        });
    }

    /**
     * Get thumbnail/image URL.
     * Returns image column value (URL from gallery).
     */
    public function getThumbnailUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }
        
        // If already full URL, return as is (backward compatibility)
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }
        
        // Convert relative path to full URL
        return asset($this->image);
    }

    /**
     * Get image URL attribute (alias for image column).
     * Returns full URL from relative path stored in database.
     */
    public function getImageUrlAttribute()
    {
        return $this->thumbnail_url;
    }

    /**
     * Get default slug prefix for products
     * Prefix = null để phù hợp SEO (slug trực tiếp: /ten-san-pham)
     */
    protected function getDefaultSlugPrefix(): ?string
    {
        return null;
    }
}
