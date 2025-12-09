<?php

namespace App\Helpers;

use App\Models\Category;

class CategoryHelper
{
    /**
     * Get active categories with published products
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getActiveCategoriesWithProducts()
    {
        return Category::where('status', 'active')
            ->with(['products' => function ($query) {
                $query->where('status', 'published')->orderBy('id');
            }])
            ->orderBy('sort_order')
            ->get();
    }

    /**
     * Get active categories only (without products)
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getActiveCategories()
    {
        return Category::where('status', 'active')
            ->orderBy('sort_order')
            ->get();
    }
}

