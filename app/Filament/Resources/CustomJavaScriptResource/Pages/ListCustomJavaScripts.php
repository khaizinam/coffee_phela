<?php

namespace App\Filament\Resources\CustomJavaScriptResource\Pages;

use App\Filament\Resources\CustomJavaScriptResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomJavaScripts extends ListRecords
{
    protected static string $resource = CustomJavaScriptResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
