<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGalleries extends ListRecords
{
    protected static string $resource = GalleryResource::class;

    protected function getActions(): array
    {
        return [
            // CreateAction removed - upload via modal in ProductResource instead
            // Users can upload images via the gallery modal in Product edit page
        ];
    }
}
