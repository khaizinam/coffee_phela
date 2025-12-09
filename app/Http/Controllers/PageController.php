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

    public function menu()
    {
        $seo = [
            'title' => 'Thực đơn - Phela | Cà phê, Trà & Đặc sản',
            'description' => 'Khám phá thực đơn đa dạng của Phela: cà phê, trà, bánh ngọt, bữa sáng, bữa trưa và đồ uống. Nốt hương đặc sản Việt Nam.',
            'keywords' => 'thực đơn Phela, cà phê, trà, bánh ngọt, bữa sáng, bữa trưa, đồ uống, menu Phela',
            'og_title' => 'Thực đơn - Phela',
            'og_description' => 'Khám phá thực đơn đa dạng của Phela: cà phê, trà, bánh ngọt và đặc sản Việt Nam.',
            'og_image' => asset('img/new/logo-phela.png'),
            'og_url' => route('menu'),
            'canonical' => route('menu'),
        ];

        // Lấy tất cả categories có status = active và sắp xếp theo sort_order
        $categories = \App\Models\Category::where('status', 'active')
            ->with(['products' => function ($query) {
                $query->where('status', 'published')->orderBy('id');
            }])
            ->orderBy('sort_order')
            ->get();

        return view('pages.menu', compact('seo', 'categories'));
    }

    public function about()
    {
        $seo = [
            'title' => 'Giới thiệu - Phela | Về chúng tôi',
            'description' => 'Tìm hiểu về Phela - Nốt Hương Đặc Sản. Sứ mệnh đánh thức những nốt hương đặc sản của nông sản Việt Nam. Giá trị Nguyên Bản - Thủ Công.',
            'keywords' => 'giới thiệu Phela, về Phela, sứ mệnh Phela, nốt hương đặc sản, nguyên bản, thủ công',
            'og_title' => 'Giới thiệu - Phela',
            'og_description' => 'Tìm hiểu về Phela - Nốt Hương Đặc Sản và sứ mệnh đánh thức những nốt hương đặc sản của nông sản Việt Nam.',
            'og_image' => asset('img/new/logo-phela.png'),
            'og_url' => route('about'),
            'canonical' => route('about'),
        ];

        return view('pages.about', compact('seo'));
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

        // Lấy thumbnail
        $thumbnail = $product->thumbnail_url;

        // Lấy gallery images
        $galleryImages = $product->getMedia('gallery')->map(function ($media) {
            return [
                'url' => $media->getUrl(),
                'name' => $media->name,
            ];
        });

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

    public function galleryCoffee()
    {
        $seo = [
            'title' => 'Ảnh Cà phê - Phela | Gallery Cà phê',
            'description' => 'Thư viện ảnh cà phê của Phela. Khám phá những khoảnh khắc đẹp về cà phê, quy trình pha chế và không gian thưởng thức cà phê.',
            'keywords' => 'ảnh cà phê, gallery cà phê, hình ảnh cà phê Phela, cà phê Việt Nam',
            'og_title' => 'Ảnh Cà phê - Phela',
            'og_description' => 'Thư viện ảnh cà phê của Phela - Nốt Hương Đặc Sản.',
            'og_image' => asset('img/new/logo-phela.png'),
            'og_url' => route('gallery.coffee'),
            'canonical' => route('gallery.coffee'),
        ];

        return view('pages.gallery-coffee', compact('seo'));
    }

    public function galleryFood()
    {
        $seo = [
            'title' => 'Ảnh Thực phẩm - Phela | Gallery Thực phẩm',
            'description' => 'Thư viện ảnh thực phẩm của Phela. Khám phá những món ăn, đồ uống và đặc sản được chế biến từ nông sản Việt Nam.',
            'keywords' => 'ảnh thực phẩm, gallery thực phẩm, hình ảnh món ăn Phela, đặc sản Việt Nam',
            'og_title' => 'Ảnh Thực phẩm - Phela',
            'og_description' => 'Thư viện ảnh thực phẩm của Phela - Nốt Hương Đặc Sản.',
            'og_image' => asset('img/new/logo-phela.png'),
            'og_url' => route('gallery.food'),
            'canonical' => route('gallery.food'),
        ];

        return view('pages.gallery-food', compact('seo'));
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
}

