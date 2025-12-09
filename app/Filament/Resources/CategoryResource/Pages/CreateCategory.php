<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Remove slug_key from category data
        $slugKey = $data['slug_key'] ?? null;
        $slugPrefix = $data['slug_prefix'] ?? null; // Prefix = null cho SEO
        unset($data['slug_key'], $data['slug_prefix']);
        
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
