<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class PageController extends Controller
{
    public function home()
    {
        // Query categories với products, order theo sort_order, tối đa 12 categories
        $allCategories = Category::with(['products' => function ($query) {
            $query->where('status', 'published')
                  ->orderBy('name');
        }])
        ->where('status', 'active')
        ->orderBy('sort_order')
        ->orderBy('name')
        ->limit(12)
        ->get();

        // 6 category đầu cho block show
        $categories = $allCategories->take(6);
        
        // 6 category tiếp theo cho hidden block
        $hiddenCategories = $allCategories->slice(6)->take(6);

        $seo = [
            'title' => 'Phela - Nốt Hương Đặc Sản | Trang chủ',
            'description' => 'Phela - Nốt Hương Đặc Sản. Trân quý, nâng niu những giá trị Nguyên Bản ở mỗi vùng đất, đánh thức những nốt hương đặc sản của nông sản Việt Nam. Cà phê, trà và đặc sản thủ công.',
            'keywords' => 'Phela, cà phê Việt Nam, trà Việt Nam, đặc sản, nông sản nguyên bản, cà phê thủ công, trà thủ công, nốt hương đặc sản',
            'og_title' => 'Phela - Nốt Hương Đặc Sản',
            'og_description' => 'Trân quý, nâng niu những giá trị Nguyên Bản ở mỗi vùng đất, đánh thức những nốt hương đặc sản của nông sản Việt Nam.',
            'og_image' => asset('img/new/logo-phela.png'),
            'og_url' => route('home'),
            'canonical' => route('home'),
            'structured_data' => [
                '@context' => 'https://schema.org',
                '@type' => 'CafeOrCoffeeShop',
                'name' => 'Phela',
                'description' => 'Nốt Hương Đặc Sản - Phê La luôn trân quý, nâng niu những giá trị Nguyên Bản ở mỗi vùng đất',
                'url' => route('home'),
                'telephone' => '1900 3013',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => '289 Đinh Bộ Lĩnh, Phường Bình Thạnh',
                    'addressLocality' => 'Hồ Chí Minh',
                    'addressCountry' => 'VN'
                ],
                'openingHours' => [
                    'Mo-Fr 09:00-00:00',
                    'Sa 10:00-00:00',
                    'Su 10:00-23:00'
                ]
            ]
        ];

        return view('pages.home', compact('seo', 'categories', 'hiddenCategories'));
    }

    public function contact()
    {
        $seo = [
            'title' => 'Liên hệ - Phela | Thông tin liên hệ',
            'description' => 'Liên hệ với Phela: Hotline 1900 3013 (8h30-22h), Email cskh@phela.vn. Trụ sở: 289 Đinh Bộ Lĩnh, Bình Thạnh, TP.HCM. Chi nhánh Hà Nội.',
            'keywords' => 'liên hệ Phela, hotline Phela, địa chỉ Phela, email Phela, thông tin liên hệ',
            'og_title' => 'Liên hệ - Phela',
            'og_description' => 'Liên hệ với Phela: Hotline 1900 3013, Email cskh@phela.vn. Trụ sở Hồ Chí Minh và chi nhánh Hà Nội.',
            'og_image' => asset('img/new/logo-phela.png'),
            'og_url' => route('contact'),
            'canonical' => route('contact'),
            'structured_data' => [
                '@context' => 'https://schema.org',
                '@type' => 'ContactPage',
                'name' => 'Liên hệ Phela',
                'description' => 'Thông tin liên hệ với Phela',
                'url' => route('contact'),
                'mainEntity' => [
                    '@type' => 'Organization',
                    'name' => 'Phela',
                    'telephone' => '1900 3013',
                    'email' => 'cskh@phela.vn',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => '289 Đinh Bộ Lĩnh, Phường Bình Thạnh',
                        'addressLocality' => 'Hồ Chí Minh',
                        'addressCountry' => 'VN'
                    ]
                ]
            ]
        ];

        return view('pages.contact', compact('seo'));
    }

    /**
     * Get product detail for modal
     */
    public function getProductDetail($id)
    {
        $product = \App\Models\Product::with('categories')
            ->findOrFail($id);

        // Lấy thumbnail (returns full URL via accessor)
        $thumbnail = $product->image_url;

        // Lấy gallery images từ gallery_entity
        $galleryImages = [];
        $productGalleries = $product->getGalleryImages('gallery');
        foreach ($productGalleries as $gallery) {
            $galleryImages[] = [
                'url' => $gallery->full_url,
                'name' => $gallery->name ?? $gallery->file_name,
            ];
        }
        
        // Nếu không có gallery, dùng image từ products.image
        if (empty($galleryImages) && $product->image_url) {
            $galleryImages[] = [
                'url' => $product->image_url,
                'name' => $product->name,
            ];
        }

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'content' => $product->content,
            'price' => $product->price,
            'thumbnail' => $thumbnail,
            'gallery' => $galleryImages,
            'categories' => $product->categories->pluck('name')->toArray(),
        ]);
    }

    public function galleryIndex()
    {
        $seo = [
            'title' => 'Ảnh - Phela | Gallery',
            'description' => 'Thư viện ảnh của Phela. Khám phá những khoảnh khắc đẹp về cà phê, trà và đặc sản Việt Nam.',
            'keywords' => 'ảnh Phela, gallery, hình ảnh Phela, cà phê Việt Nam, trà Việt Nam, đặc sản Việt Nam',
            'og_title' => 'Ảnh - Phela',
            'og_description' => 'Thư viện ảnh của Phela - Nốt Hương Đặc Sản.',
            'og_image' => asset('img/new/logo-phela.png'),
            'og_url' => route('gallery.index'),
            'canonical' => route('gallery.index'),
        ];

        // Lấy tất cả categories có status = active với slug
        $categories = \App\Models\Category::where('status', 'active')
            ->with('slug')
            ->orderBy('sort_order')
            ->get();

        // Lấy tất cả products có status = published và có images (gallery hoặc thumbnail)
        $products = \App\Models\Product::where('status', 'published')
            ->with(['categories.slug', 'media'])
            ->get()
            ->filter(function ($product) {
                // Lấy products có gallery images hoặc thumbnail images
                $hasGallery = $product->getMedia('gallery')->count() > 0;
                $hasThumbnail = !empty($product->image); // image column stores relative path
                return $hasGallery || $hasThumbnail;
            });

        // Tạo mảng gallery items từ products
        $galleryItems = [];
        foreach ($products as $product) {
            // Lấy category slug keys (chung cho tất cả images của product)
            $categorySlugs = [];
            foreach ($product->categories as $category) {
                // Lấy slug từ relationship slug()
                $slugModel = $category->slug()->first();
                if ($slugModel && $slugModel->key) {
                    $categorySlugs[] = $slugModel->key;
                } else {
                    // Fallback: tạo slug từ name nếu không có slug trong database
                    $categorySlugs[] = \Illuminate\Support\Str::slug($category->name);
                }
            }

            // Nếu không có category, bỏ qua product này
            if (empty($categorySlugs)) {
                continue;
            }

            // Lấy gallery images
            $galleryImages = $product->getMedia('gallery');
            foreach ($galleryImages as $image) {
                $galleryItems[] = [
                    'id' => $product->id,
                    'image_url' => $image->getUrl(),
                    'image_name' => $image->name ?? $product->name,
                    'product_name' => $product->name,
                    'categories' => $categorySlugs,
                ];
            }

            // Nếu không có gallery images, lấy thumbnail image từ cột image
            if ($galleryImages->isEmpty()) {
                $thumbnailImage = $product->image; // Relative path: /storage/...
                if ($thumbnailImage) {
                    $galleryItems[] = [
                        'id' => $product->id,
                        'image_url' => $product->image_url, // Use accessor to get full URL
                        'image_name' => $product->name,
                        'product_name' => $product->name,
                        'categories' => $categorySlugs,
                    ];
                }
            }
        }

        return view('pages.gallery', compact('seo', 'categories', 'galleryItems'));
    }

    public function blogHealthy()
    {
        $seo = [
            'title' => 'Blog Thực phẩm lành mạnh - Phela | Tin tức & Chia sẻ',
            'description' => 'Blog về thực phẩm lành mạnh của Phela. Chia sẻ kiến thức về dinh dưỡng, thực phẩm hữu cơ và lối sống lành mạnh.',
            'keywords' => 'blog thực phẩm lành mạnh, dinh dưỡng, thực phẩm hữu cơ, lối sống lành mạnh, blog Phela',
            'og_title' => 'Blog Thực phẩm lành mạnh - Phela',
            'og_description' => 'Blog về thực phẩm lành mạnh, dinh dưỡng và lối sống lành mạnh từ Phela.',
            'og_image' => asset('img/new/logo-phela.png'),
            'og_url' => route('blog.healthy'),
            'canonical' => route('blog.healthy'),
        ];

        return view('pages.blog-healthy', compact('seo'));
    }

    public function blogRecipe()
    {
        $seo = [
            'title' => 'Blog Công thức - Phela | Công thức nấu ăn & Pha chế',
            'description' => 'Blog công thức của Phela. Chia sẻ công thức pha chế cà phê, trà và các món ăn từ đặc sản Việt Nam.',
            'keywords' => 'blog công thức, công thức pha chế, công thức nấu ăn, cách pha cà phê, cách pha trà, blog Phela',
            'og_title' => 'Blog Công thức - Phela',
            'og_description' => 'Blog công thức pha chế và nấu ăn từ Phela - Nốt Hương Đặc Sản.',
            'og_image' => asset('img/new/logo-phela.png'),
            'og_url' => route('blog.recipe'),
            'canonical' => route('blog.recipe'),
        ];

        return view('pages.blog-recipe', compact('seo'));
    }

    public function stores()
    {
        // Dữ liệu hệ thống cửa hàng - tất cả địa chỉ trong một mảng phẳng
        $allStores = [
            [
                'city' => 'Hồ Chí Minh',
                'name' => 'Phela - Trụ sở chính',
                'address' => '289 Đinh Bộ Lĩnh, Phường Bình Thạnh, TP. Hồ Chí Minh, Việt Nam',
                'phone' => '1900 3013',
                'hours' => 'Thứ 2 - Chủ nhật: 8h30 - 22h00',
                'opened' => '2022',
                'map_url' => 'https://www.google.com/maps?q=289+Đinh+Bộ+Lĩnh,+Bình+Thạnh,+Hồ+Chí+Minh'
            ],
            [
                'city' => 'Hồ Chí Minh',
                'name' => 'Phela - Chi nhánh Quận 1',
                'address' => '123 Nguyễn Huệ, Phường Bến Nghé, Quận 1, TP. Hồ Chí Minh, Việt Nam',
                'phone' => '1900 3013',
                'hours' => 'Thứ 2 - Chủ nhật: 8h30 - 22h00',
                'opened' => '2023',
                'map_url' => 'https://www.google.com/maps?q=123+Nguyễn+Huệ,+Quận+1,+Hồ+Chí+Minh'
            ],
            [
                'city' => 'Hồ Chí Minh',
                'name' => 'Phela - Chi nhánh Quận 3',
                'address' => '456 Võ Văn Tần, Phường 6, Quận 3, TP. Hồ Chí Minh, Việt Nam',
                'phone' => '1900 3013',
                'hours' => 'Thứ 2 - Chủ nhật: 8h30 - 22h00',
                'opened' => '2023',
                'map_url' => 'https://www.google.com/maps?q=456+Võ+Văn+Tần,+Quận+3,+Hồ+Chí+Minh'
            ],
            [
                'city' => 'Hà Nội',
                'name' => 'Phela - Chi nhánh Hà Nội',
                'address' => '65 Phạm Ngọc Thạch, Phường Đống Đa, Hà Nội, Việt Nam',
                'phone' => '1900 3013',
                'hours' => 'Thứ 2 - Chủ nhật: 8h30 - 22h00',
                'opened' => '03/2021',
                'map_url' => 'https://www.google.com/maps?q=65+Phạm+Ngọc+Thạch,+Đống+Đa,+Hà+Nội'
            ],
            [
                'city' => 'Hà Nội',
                'name' => 'Phela - Chi nhánh Hoàng Mai',
                'address' => 'Lô 04-9A Khu công nghiệp Vĩnh Hoàng, Phường Hoàng Mai, Hà Nội, Việt Nam',
                'phone' => '1900 3013',
                'hours' => 'Thứ 2 - Chủ nhật: 8h30 - 22h00',
                'opened' => '2022',
                'map_url' => 'https://www.google.com/maps?q=Lô+04-9A+Khu+công+nghiệp+Vĩnh+Hoàng,+Hoàng+Mai,+Hà+Nội'
            ],
            [
                'city' => 'Hà Nội',
                'name' => 'Phela - Chi nhánh Cầu Giấy',
                'address' => '789 Trần Duy Hưng, Phường Trung Hòa, Cầu Giấy, Hà Nội, Việt Nam',
                'phone' => '1900 3013',
                'hours' => 'Thứ 2 - Chủ nhật: 8h30 - 22h00',
                'opened' => '2024',
                'map_url' => 'https://www.google.com/maps?q=789+Trần+Duy+Hưng,+Cầu+Giấy,+Hà+Nội'
            ],
            [
                'city' => 'Đà Nẵng',
                'name' => 'Phela - Chi nhánh Đà Nẵng',
                'address' => '321 Nguyễn Văn Linh, Phường Nam Dương, Hải Châu, Đà Nẵng, Việt Nam',
                'phone' => '1900 3013',
                'hours' => 'Thứ 2 - Chủ nhật: 8h30 - 22h00',
                'opened' => '2023',
                'map_url' => 'https://www.google.com/maps?q=321+Nguyễn+Văn+Linh,+Đà+Nẵng'
            ],
            [
                'city' => 'Đà Lạt',
                'name' => 'Phela - Chi nhánh Đà Lạt',
                'address' => '159 Nguyễn Văn Cừ, Phường 1, Đà Lạt, Lâm Đồng, Việt Nam',
                'phone' => '1900 3013',
                'hours' => 'Thứ 2 - Chủ nhật: 8h30 - 22h00',
                'opened' => '2024',
                'map_url' => 'https://www.google.com/maps?q=159+Nguyễn+Văn+Cừ,+Đà+Lạt'
            ],
            [
                'city' => 'Biên Hòa',
                'name' => 'Phela - Chi nhánh Biên Hòa',
                'address' => '456 Phạm Văn Thuận, Phường Tân Tiến, Biên Hòa, Đồng Nai, Việt Nam',
                'phone' => '1900 3013',
                'hours' => 'Thứ 2 - Chủ nhật: 8h30 - 22h00',
                'opened' => '2023',
                'map_url' => 'https://www.google.com/maps?q=456+Phạm+Văn+Thuận,+Biên+Hòa'
            ],
            [
                'city' => 'Nha Trang',
                'name' => 'Phela - Chi nhánh Nha Trang',
                'address' => '789 Trần Phú, Phường Lộc Thọ, Nha Trang, Khánh Hòa, Việt Nam',
                'phone' => '1900 3013',
                'hours' => 'Thứ 2 - Chủ nhật: 8h30 - 22h00',
                'opened' => '2024',
                'map_url' => 'https://www.google.com/maps?q=789+Trần+Phú,+Nha+Trang'
            ],
            [
                'city' => 'Huế',
                'name' => 'Phela - Chi nhánh Huế',
                'address' => '123 Lê Lợi, Phường Phú Hội, Huế, Thừa Thiên Huế, Việt Nam',
                'phone' => '1900 3013',
                'hours' => 'Thứ 2 - Chủ nhật: 8h30 - 22h00',
                'opened' => '2024',
                'map_url' => 'https://www.google.com/maps?q=123+Lê+Lợi,+Huế'
            ],
            [
                'city' => 'Cần Thơ',
                'name' => 'Phela - Chi nhánh Cần Thơ',
                'address' => '456 Nguyễn Văn Cừ, Phường An Khánh, Ninh Kiều, Cần Thơ, Việt Nam',
                'phone' => '1900 3013',
                'hours' => 'Thứ 2 - Chủ nhật: 8h30 - 22h00',
                'opened' => '2024',
                'map_url' => 'https://www.google.com/maps?q=456+Nguyễn+Văn+Cừ,+Cần+Thơ'
            ],
        ];

        // Nhóm lại theo tỉnh thành cho structured data
        $stores = [];
        foreach ($allStores as $store) {
            $stores[$store['city']][] = $store;
        }

        $seo = [
            'title' => 'Hệ thống cửa hàng - Phela | Danh sách chi nhánh',
            'description' => 'Tìm cửa hàng Phela gần bạn. Hệ thống cửa hàng Phela tại Hồ Chí Minh, Hà Nội, Đà Nẵng, Đà Lạt, Biên Hòa và các tỉnh thành khác.',
            'keywords' => 'hệ thống cửa hàng Phela, chi nhánh Phela, địa chỉ Phela, cửa hàng Phela, Phela Hà Nội, Phela Hồ Chí Minh',
            'og_title' => 'Hệ thống cửa hàng - Phela',
            'og_description' => 'Tìm cửa hàng Phela gần bạn. Hệ thống cửa hàng tại nhiều tỉnh thành trên cả nước.',
            'og_image' => asset('img/new/logo-phela.png'),
            'og_url' => route('stores'),
            'canonical' => route('stores'),
            'structured_data' => [
                '@context' => 'https://schema.org',
                '@type' => 'ItemList',
                'name' => 'Hệ thống cửa hàng Phela',
                'description' => 'Danh sách các cửa hàng Phela trên toàn quốc',
                'itemListElement' => array_map(function ($city, $cityStores) {
                    return [
                        '@type' => 'ListItem',
                        'position' => array_search($city, array_keys($cityStores)) + 1,
                        'name' => $city,
                        'item' => array_map(function ($store) {
                            return [
                                '@type' => 'LocalBusiness',
                                'name' => $store['name'],
                                'address' => $store['address'],
                                'telephone' => $store['phone'],
                                'openingHours' => $store['hours']
                            ];
                        }, $cityStores)
                    ];
                }, array_keys($stores), $stores)
            ]
        ];

        return view('pages.stores', compact('allStores', 'stores', 'seo'));
    }

    /**
     * Show dynamic page by slug
     * Route này phải được đặt cuối cùng trong web.php để tránh conflict với các route khác
     */
    public function showPage($any)
    {
        // Kiểm tra xem có phải là route đã được định nghĩa không (tránh conflict)
        $excludedRoutes = ['admin', 'api', 'gallery', 'blog', 'login'];
        $firstSegment = explode('/', trim($any, '/'))[0];
        
        if (in_array($firstSegment, $excludedRoutes)) {
            abort(404);
        }

        // Chỉ lấy slug cuối cùng (nếu có nested path)
        $slugKey = basename($any);

        // Tìm page theo slug key với prefix = null
        $slugModel = \App\Models\Slug::where('key', $slugKey)
            ->where('entity', \App\Models\Page::class)
            ->whereNull('prefix')
            ->first();

        if (!$slugModel) {
            abort(404);
        }

        $page = $slugModel->getEntity();
        
        if (!$page || $page->status !== 'active') {
            abort(404);
        }

        // Chuẩn bị SEO data từ page
        $seo = [
            'title' => $page->meta_title ?? $page->name . ' - Phela',
            'description' => $page->meta_description ?? 'Trang ' . $page->name . ' của Phela - Nốt Hương Đặc Sản',
            'keywords' => $page->meta_keywords ?? 'Phela, ' . $page->name,
            'og_title' => $page->meta_title ?? $page->name,
            'og_description' => $page->meta_description ?? 'Trang ' . $page->name . ' của Phela',
            'og_image' => $page->meta_image ? asset('storage/' . $page->meta_image) : asset('img/new/logo-phela.png'),
            'og_url' => url('/' . $slugKey),
            'canonical' => url('/' . $slugKey),
        ];

        // Lấy template từ page hoặc dùng default
        $template = $page->template ?? config('page-templates.default', 'dynamic');
        
        // Kiểm tra template có tồn tại trong config không
        $templates = config('page-templates.templates', []);
        if (!isset($templates[$template])) {
            $template = config('page-templates.default', 'dynamic');
        }
        
        // Lấy view path từ config
        $viewName = $templates[$template]['view'] ?? 'pages.dynamic';
        
        // Chuẩn bị data để truyền vào view
        $data = compact('page', 'seo');
        
        // Trả về view với template tương ứng
        return view($viewName, $data);
    }
}

