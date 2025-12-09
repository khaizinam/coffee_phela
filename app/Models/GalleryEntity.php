<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryEntity extends Model
{
    use HasFactory;

    protected $table = 'gallery_entity';

    protected $fillable = [
        'gallery_id',
        'entity_type',
        'entity_id',
        'collection',
        'sort_order',
    ];

    /**
     * Get the gallery that this entity relation belongs to.
     */
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    /**
     * Get the parent entity model.
     */
    public function entity()
    {
        return $this->morphTo();
    }
}

