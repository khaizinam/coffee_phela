<?php

if (!function_exists('app_get_categories')) {
    /**
     * Get active categories with published products
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function app_get_categories()
    {
        return \App\Models\Category::where('status', 'active')
            ->with(['products' => function ($query) {
                $query->where('status', 'published')->orderBy('id');
            }])
            ->orderBy('sort_order')
            ->get();
    }
}

if (!function_exists('getActiveCategories')) {
    /**
     * Get active categories only (without products)
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function getActiveCategories()
    {
        return \App\Models\Category::where('status', 'active')
            ->orderBy('sort_order')
            ->get();
    }
}

