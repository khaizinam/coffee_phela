<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use App\Services\GalleryService;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGallery extends EditRecord
{
    protected static string $resource = GalleryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->action(function (GalleryService $galleryService) {
                    $galleryService->delete($this->record);
                    return redirect($this->getResource()::getUrl('index'));
                })
                ->requiresConfirmation()
                ->modalHeading('Xóa ảnh')
                ->modalSubheading('Bạn có chắc chắn muốn xóa ảnh này? File và record sẽ bị xóa vĩnh viễn.')
                ->modalButton('Xóa'),
        ];
    }
}
