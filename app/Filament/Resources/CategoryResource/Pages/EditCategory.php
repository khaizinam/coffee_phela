<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load slug data vào form
        $slug = $this->record->slug()->first();
        if ($slug && is_object($slug)) {
            $data['slug_key'] = $slug->key;
            $data['slug_prefix'] = $slug->prefix; // Có thể là null
        } else {
            $data['slug_key'] = null;
            $data['slug_prefix'] = null; // Prefix = null cho SEO
        }
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Remove slug fields from category data
        $slugKey = $data['slug_key'] ?? null;
        $slugPrefix = $data['slug_prefix'] ?? null; // Prefix = null cho SEO
        unset($data['slug_key'], $data['slug_prefix']);
        
        session(['pending_slug_key' => $slugKey, 'pending_slug_prefix' => $slugPrefix]);
        
        return $data;
    }

    protected function afterSave(): void
    {
        // Cập nhật slug từ form data (chỉ khi user nhập/sửa slug_key)
        $slugKey = session('pending_slug_key');
        $slugPrefix = session('pending_slug_prefix', null); // Prefix = null cho SEO
        
        if ($slugKey) {
            $this->record->updateSlug($slugKey, $slugPrefix);
        } else {
            // Nếu không có slug_key, giữ nguyên slug cũ hoặc tạo mới nếu chưa có
            if (!$this->record->slug()->first()) {
                $this->record->getSlug($slugPrefix);
            }
        }
        
        session()->forget(['pending_slug_key', 'pending_slug_prefix']);
    }
}
