<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomJavaScriptResource\Pages;
use App\Filament\Resources\CustomJavaScriptResource\RelationManagers;
use App\Models\CustomJavaScript;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomJavaScriptResource extends Resource
{
    protected static ?string $model = CustomJavaScript::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomJavaScripts::route('/'),
            'create' => Pages\CreateCustomJavaScript::route('/create'),
            'edit' => Pages\EditCustomJavaScript::route('/{record}/edit'),
        ];
    }    
}
