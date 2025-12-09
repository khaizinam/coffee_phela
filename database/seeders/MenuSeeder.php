<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define categories and their products
        $menuData = [
            'Cà phê' => [
                ['name' => 'PHÊ XỈU VANI', 'description' => '(Có sẵn Thạch) Vị chua nhẹ tự nhiên của hạt Arabica Lạc Dương...', 'price' => 20000],
                ['name' => 'PHÊ ESPRESSO (Hạt Colom, Ethi)', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'PHÊ ESPRESSO (Hạt Ro, Ara)', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'PHÊ LATTE (Hạt Colom, Ethi)', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'PHÊ LATTE (Hạt Ro, Ara)', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'PHÊ CAPPU (Hạt Ro, Ara)', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'PHÊ AME (Hạt Ro, Ara)', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'PHÊ AME (Hạt Colom, Ethi)', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'PHÊ NÂU', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'PHÊ ĐEN', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
            ],
            'SYPHON' => [
                ['name' => 'Mật Nhãn - Ô Long Long Nhãn Sữa', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'Phong Lan (size La)', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'Ô Long Nhài Sữa (size La)', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'Ô Long Sữa Phê La (size La)', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'Phong Lan (Ô Long Vani Sữa)', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'Ô LONG SỮA PHÊ LA', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
                ['name' => 'Ô LONG NHÀI SỮA', 'description' => 'lorem ispum is a nano metter...', 'price' => 20000],
            ],
            'FRENCH PRESS' => [
                ['name' => 'LỤA ĐÀO - Phiên bản Đồng Chill yêu thích (size La)', 'description' => 'Phiên bản kèm Đào Hồng Dầm và Thạch Trà Đào Hồng. Trà Ô Long Lụa Đào thơm hoa ngọt ngào, kết hợp cùng Sữa Tươi Thanh Trùng', 'price' => 20000],
                ['name' => 'LỤA ĐÀO - Phiên bản Đồng Chill yêu thích (size Phê)', 'description' => 'Phiên bản kèm Đào Hồng Dầm và Thạch Trà Đào Hồng. Trà Ô Long Lụa Đào thơm hoa ngọt ngào, kết hợp cùng Sữa Tươi Thanh Trùng', 'price' => 20000],
                ['name' => 'Trà Vỏ Cà Phê (size La)', 'description' => 'Trà Vỏ Cà Phê - thức uống độc đáo được làm từ vỏ quả cà phê, hương trà thơm nhẹ hòa quyện cùng vị chua dịu của chanh vàng.', 'price' => 20000],
                ['name' => 'Ô LONG ĐÀO HỒNG (Size La)', 'description' => 'Phiên bản kèm Đào Hồng Dầm và Thạch Trà Đào Hồng. Trà Ô Long Đào Hồng thanh mát, vị trà nhẹ nhàng, thơm đào ngọt ngào,', 'price' => 20000],
                ['name' => 'Gấm (size La)', 'description' => 'Gấm sự kết hợp giữa Trà Ô Long Vải thơm mát cùng với trái vải căng mọng, đem đến dư vị ngọt mát và thanh khiết.', 'price' => 20000],
                ['name' => 'GẤM', 'description' => 'Gấm - Vị trà Ô Long hòa quyện cùng trái vải căng mọng, mang đến dư vị ngọt mát và thanh khiết giải nhiệt tuyệt vời cho ngày hè.', 'price' => 20000],
                ['name' => 'TRÀ VỎ CÀ PHÊ', 'description' => 'Trà Vỏ Cà Phê được ủ từ vỏ cà phê, hương trà thơm nhẹ hoà quyện cùng vị chua dịu của chanh vàng.', 'price' => 20000],
            ],
            'MOKA POT' => [
                ['name' => 'Tấm (size La)', 'description' => 'Trà Ô Long đậm đà kết hợp hài hoà với gạo rang thơm bùi.', 'price' => 20000],
                ['name' => 'Khói B\'Lao (size La)', 'description' => 'Sự hoà quyện của các tầng hương: Nốt hương đầu là khói đậm, hương giữa là khói nhẹ & đọng lại ở hậu vị là hương hoa ngọc lan.', 'price' => 20000],
                ['name' => 'KHÓI B\'LAO', 'description' => 'Khói B\'Lao sự hoà quyện của các tầng hương: Nốt hương đầu là khói đậm, hương giữa là khói nhẹ & đọng lại ở hậu vị là hương hoa ngọc lan.', 'price' => 20000],
                ['name' => 'TẤM', 'description' => 'Tấm là sự kết hợp hoàn hảo giữa vị đậm đà của trà Ô Long và hương thơm bùi của gạo rang nguyên chất, mang đến thức uống độc đáo và đầy hấp dẫn.', 'price' => 20000],
            ],
            'COLD BREW' => [
                ['name' => 'SỮA CHUA BÒNG BƯỞI', 'description' => '(Có sẵn Thạch Trà Chanh Vàng) Sữa Chua Ô Long đá xay sáng tạo cùng nền trà Cold Brew, vị Bưởi the the, thêm Chanh Vàng tươi mát. Sản phẩm có thể bị tan với khoảng cách xa trên 3,5km.', 'price' => 20000],
                ['name' => 'BÒNG BƯỞI - Ô LONG BƯỞI NHA ĐAM', 'description' => 'Trà Ô Long Đặc Sản kết hợp cùng vị Bưởi the mát, thêm Vỏ Bưởi sấy và Nha Đam giòn dai sần sật, mang đến hương vị thanh mát & nhẹ nhàng.', 'price' => 20000],
                ['name' => 'Lang Biang (size La)', 'description' => 'Lang Biang hương vị thuần khiết của trà Ô Long Đặc Sản cùng mứt hoa nhài thơm nhẹ.', 'price' => 20000],
                ['name' => 'SI MƠ - COLD BREW Ô LONG MƠ ĐÀO (size La)', 'description' => 'Trà Ô Long Đặc Sản ủ lạnh, kết hợp cùng Mơ Má Đào và Đào Hồng dầm, thêm Thạch Trà Vỏ mềm dai mang đến hương vị thanh mát & nhẹ nhàng', 'price' => 20000],
                ['name' => 'LANG BIANG', 'description' => 'Lang Biang với hương vị thuần khiết của trà Ô Long Đặc Sản cùng mứt hoa nhài thơm nhẹ.', 'price' => 20000],
            ],
            'Ô LONG MATCHA' => [
                ['name' => 'MATCHA PHAN XI PĂNG', 'description' => 'Lớp kem Ô Long Matcha kết hợp cùng cốt dừa đá xay mát lạnh, thưởng thức cùng Thạch Ô Long Matcha mềm mượt mang đến trải nghiệm thú vị.', 'price' => 20000],
                ['name' => 'MATCHA COCO LATTE', 'description' => 'Matcha Coco Latte với Lớp kem Ô Long Matcha bồng bềnh sánh mịn hoà quyện cùng sữa dừa Bến Tre hữu cơ ngọt thơm.', 'price' => 20000],
            ],
            'TOPPING' => [
                ['name' => 'THẠCH TRÀ CHANH VÀNG', 'description' => 'Thạch Trà Chanh Vàng mềm dai, thơm dịu - không chất bảo quản - thủ công sáng tạo từ Trà Cold Brew Ô Long Bưởi & Chanh Vàng. Phù hợp với mọi trà trái cây tại Phê La.', 'price' => 20000],
                ['name' => 'THẠCH XỈU VANI', 'description' => 'Thạch Xỉu Vani mềm mượt - không chất bảo quản - thủ công sáng tạo từ cà phê Arabica Lạc Dương & Robusta Lâm Hà, kết hợp Vani Tự Nhiên cùng Sữa Dừa. Phù hợp với các sản phẩm Cà Phê Phin & Cà Phê Máy.', 'price' => 20000],
                ['name' => 'THẠCH TRÀ ĐÀO HỒNG', 'description' => 'Thạch Ô Long Đào Hồng mềm dai - không chất bảo quản - thủ công sáng tạo từ Trà Ô Long Đặc Sản & Đào Hồng Dầm. Phù hợp với tất cả sản phẩm Trà Trái Cây tại Phê La', 'price' => 20000],
                ['name' => 'THẠCH Ô LONG MATCHA', 'description' => 'Thạch Ô Long Matcha mềm mượt - không chất bảo quản - thủ công sáng tạo từ Trà Ô Long Matcha & Sữa Dừa Bến Tre. Phù hợp với mọi sản phẩm trà sữa và Ô Long Matcha tại Phê La.', 'price' => 20000],
                ['name' => 'THẠCH TRÀ VỎ', 'description' => 'Thạch Trà Vỏ mềm dai - không chất bảo quản - thủ công sáng tạo từ Trà Vỏ Cà Phê & Ô Mai Dây gia truyền (Xí Muội). Phù hợp với mọi trà trái cây tại Phê La.', 'price' => 20000],
                ['name' => 'TRÂN CHÂU PHONG LAN', 'description' => 'Trân Châu Phong Lan giòn dai - không chất bảo quản, xen lẫn hạt Vani đen tự nhiên & hương vị nhẹ nhàng. Phù hợp với mọi đồ uống tại Phê La.', 'price' => 20000],
                ['name' => 'Trân Châu Ô Long', 'description' => 'Trân châu Ô Long: Nguyên liệu: Trà Ô Long Phương thức: Thủ công..', 'price' => 20000],
                ['name' => 'TRÂN CHÂU GẠO RANG', 'description' => 'Trân châu mềm dẻo - vị trà Ô Long hoà quyện cùng gạo rang thơm bùi nhẹ nhàng. Phù hợp thưởng thức cùng trà sữa. Không chất bảo quản. Nguyên bản - thủ công.', 'price' => 20000],
            ],
            'PLUS - LON/CHAI' => [
                ['name' => 'Plus - Mật Nhãn', 'description' => 'Lon 500ml. Trà Ô Long Đặc Sản hoà quyện cùng Long Nhãn ngọt ngào, nốt hương đỗ đen rang thơm bùi. HSD 3 ngày từ NSX. Bảo quản 2-5 độ C. Lắc đều trước khi dùng. Sử dụng trong vòng 24h sau khi mở nắp. Sản phẩm đóng gói theo quy cách tiêu chuẩn, không bao gồm Túi giữ nhiệt Phê La.', 'price' => 20000],
                ['name' => 'PLUS - KHÓI B\'LAO', 'description' => 'Lon 500ml. Trà Ô Long đậm đà cùng nốt hương đầu là khói đậm, hương giữa là khói nhẹ & lại ở hậu vị là hương hoa ngọc lan.', 'price' => 20000],
                ['name' => 'PLUS - MATCHA COCO LATTE', 'description' => 'Lon 500ml. Trà Ô Long Matcha nhẹ nhàng kết hợp cùng Sữa Dừa Bến Tre hữu cơ ngọt thơm. HSD 3 ngày từ NSX.', 'price' => 20000],
                ['name' => 'PLUS - LỤA ĐÀO', 'description' => '(100% đường) Lon 500ml. Trà Ô Long Lụa Đào thơm hoa ngọt ngào, kết hợp cùng Sữa Tươi Thanh Trùng Phê La, kèm Đào Hồng Dầm.', 'price' => 20000], // Note: Price was 20$ not 20000
                ['name' => 'PLUS - PHONG LAN', 'description' => '(100% đường) Lon 500ml. Plus - Phong Lan Trà Ô Long Đặc Sản hòa quyện cùng Vani tự nhiên, vị nhẹ nhàng, tinh tế.', 'price' => 20000],
                ['name' => 'PLUS - COLD BREW', 'description' => '(Sản phẩm không đường) Chai 500ml. Plus - Cold Brew Trà Ô Long ủ lạnh, hậu vị ngọt và thanh mát.', 'price' => 20000],
                ['name' => 'PLUS - ĐÀ LẠT', 'description' => '(100% đường) Chai 250ml. Cà phê Arabica Đà Lạt đậm đà hòa quyện cùng kem whipping thơm ngậy.', 'price' => 20000],
                ['name' => 'PLUS - ĐỈNH PHÙ VÂN', 'description' => '(100% đường) Chai 250ml. Đỉnh Phù Vân là sự kết hợp tinh tế giữa Trà Ô Long Đỏ đậm đà và kem whipping nhẹ nhàng, tạo nên lớp sánh ngậy', 'price' => 20000],
                ['name' => 'PLUS - TẤM', 'description' => 'Lon 500ml. Trà Ô Long đậm đà kết hợp hài hoà với gạo rang thơm bùi.', 'price' => 20000],
                ['name' => 'PLUS - Ô LONG NHÀI SỮA', 'description' => 'Lon 500ml. Ô Long Nhài Sữa là sự kết hợp Trà Ô Long đậm đà cùng hương nhài thơm tinh tế, thêm chút thơm ngậy từ sữa.', 'price' => 20000],
                ['name' => 'PLUS - Ô LONG SỮA PHÊ LA', 'description' => 'Lon 500ml. Trà Ô Long Đặc Sản đậm đà hòa quyện cùng vị sữa thơm ngậy.', 'price' => 20000],
            ],
        ];

        // Create categories and products
        foreach ($menuData as $categoryName => $products) {
            // Create or get category
            $category = Category::firstOrCreate(
                ['name' => $categoryName],
                [
                    'slug' => Str::slug($categoryName),
                    'description' => 'lorem ispum is a nano metter...',
                    'image' => null,
                    'parent_id' => null,
                    'sort_order' => 0,
                    'status' => 'active',
                ]
            );

            // Create products for this category
            foreach ($products as $productData) {
                $product = Product::firstOrCreate(
                    ['name' => $productData['name']],
                    [
                        'description' => $productData['description'],
                        'content' => null,
                        'price' => $productData['price'] ?? 0,
                        'status' => 'published',
                    ]
                );

                // Attach product to category
                if (!$product->categories()->where('category_id', $category->id)->exists()) {
                    $product->categories()->attach($category->id);
                }
            }
        }

        $this->command->info('Menu data seeded successfully!');
        $this->command->info('Categories created: ' . Category::count());
        $this->command->info('Products created: ' . Product::count());
    }
}

