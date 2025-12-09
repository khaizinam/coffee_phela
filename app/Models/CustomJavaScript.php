<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomJavaScript extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'code',
        'status',
        'sort_order',
    ];

    /**
     * Scope a query to only include active scripts.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query by position.
     */
    public function scopePosition($query, $position)
    {
        return $query->where('position', $position);
    }
}

