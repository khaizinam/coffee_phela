<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'parent_id',
        'link_type',
        'link',
        'target',
        'sort_order',
        'status',
    ];

    /**
     * Get the parent menu.
     */
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    /**
     * Get the child menus.
     */
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('sort_order');
    }

    /**
     * Get active child menus only.
     */
    public function activeChildren()
    {
        return $this->hasMany(Menu::class, 'parent_id')
                    ->where('status', 'active')
                    ->orderBy('sort_order');
    }

    /**
     * Get the full URL based on link_type
     */
    public function getUrlAttribute()
    {
        if ($this->link_type === 'external') {
            return $this->link;
        }

        // Internal link - tìm slug
        if ($this->link) {
            // Tìm slug với prefix = null (theo yêu cầu SEO)
            $slug = \App\Models\Slug::where('key', $this->link)
                ->whereNull('prefix')
                ->first();
            
            if ($slug) {
                // Prefix = null nên chỉ trả về /key
                return '/' . $slug->key;
            }
            
            // Fallback: nếu không tìm thấy slug, trả về link như là path
            return '/' . ltrim($this->link, '/');
        }

        return '#';
    }

    /**
     * Scope to get only root menus (no parent)
     */
    public function scopeRoots($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Scope to get only active menus
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Get all descendants (children, grandchildren, etc.)
     */
    public function descendants()
    {
        return $this->children()->with('descendants');
    }
}
