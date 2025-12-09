<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Page Templates Configuration
    |--------------------------------------------------------------------------
    |
    | Danh sách các template có sẵn cho Page module.
    | Key là template identifier, value là thông tin hiển thị.
    |
    */

    'templates' => [
        'dynamic' => [
            'label' => 'Dynamic (Mặc định)',
            'description' => 'Template động với banner và nội dung HTML',
            'view' => 'pages.dynamic',
        ],
        'about' => [
            'label' => 'About / Giới thiệu',
            'description' => 'Template cho trang giới thiệu',
            'view' => 'pages.about',
        ],
        'contact' => [
            'label' => 'Contact / Liên hệ',
            'description' => 'Template cho trang liên hệ',
            'view' => 'pages.contact',
        ],
        'stores' => [
            'label' => 'Stores / Cửa hàng',
            'description' => 'Template cho trang hệ thống cửa hàng',
            'view' => 'pages.stores',
        ],
        'blog-healthy' => [
            'label' => 'Blog Healthy',
            'description' => 'Template cho blog thực phẩm lành mạnh',
            'view' => 'pages.blog-healthy',
        ],
        'blog-recipe' => [
            'label' => 'Blog Recipe',
            'description' => 'Template cho blog công thức',
            'view' => 'pages.blog-recipe',
        ],
        'home' => [
            'label' => 'Home / Trang chủ',
            'description' => 'Template cho trang chủ',
            'view' => 'pages.home',
        ],
        'menu' => [
            'label' => 'Sản phẩm',
            'description' => 'Template cho trang sản phẩm',
            'view' => 'pages.menu',
        ],
        'gallery' => [
            'label' => 'Gallery / Ảnh',
            'description' => 'Template cho trang gallery',
            'view' => 'pages.gallery',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Template
    |--------------------------------------------------------------------------
    |
    | Template mặc định khi tạo page mới
    |
    */
    'default' => 'dynamic',
];

