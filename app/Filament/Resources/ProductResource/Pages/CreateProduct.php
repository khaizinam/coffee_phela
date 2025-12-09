<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Remove slug_key from product data (không phải field của Product model)
        $slugKey = $data['slug_key'] ?? null;
        $slugPrefix = $data['slug_prefix'] ?? null; // Prefix = null cho SEO
        unset($data['slug_key'], $data['slug_prefix']);
        
        // Lưu slug data vào session để dùng sau
        session(['pending_slug_key' => $slugKey, 'pending_slug_prefix' => $slugPrefix]);
        
        return $data;
    }

    protected function afterCreate(): void
    {
        // Tạo slug từ form data hoặc tự động từ name
        $slugKey = session('pending_slug_key');
        $slugPrefix = session('pending_slug_prefix', null); // Prefix = null cho SEO
        
        if ($slugKey) {
            // Nếu có slug_key từ form, dùng nó (sẽ tự động thêm số nếu trùng)
            $this->record->updateSlug($slugKey, $slugPrefix);
        } else {
            // Tự động tạo từ name (qua HasSlug trait - sẽ tự động thêm số nếu trùng)
            $this->record->getSlug($slugPrefix);
        }
        
        session()->forget(['pending_slug_key', 'pending_slug_prefix']);
    }
}
