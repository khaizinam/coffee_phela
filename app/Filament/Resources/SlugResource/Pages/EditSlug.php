<?php

namespace App\Filament\Resources\SlugResource\Pages;

use App\Filament\Resources\SlugResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSlug extends EditRecord
{
    protected static string $resource = SlugResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
