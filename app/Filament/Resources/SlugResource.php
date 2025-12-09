<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlugResource\Pages;
use App\Filament\Resources\SlugResource\RelationManagers;
use App\Models\Slug;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SlugResource extends Resource
{
    protected static ?string $model = Slug::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    protected static ?string $navigationLabel = 'Slugs SEO';

    protected static ?string $modelLabel = 'Slug';

    protected static ?string $pluralModelLabel = 'Slugs';

    protected static ?int $navigationSort = 99;

    // Ẩn khỏi navigation - đây là tính năng ẩn
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin Slug')
                    ->schema([
                        Forms\Components\Select::make('entity')
                            ->label('Entity (Model)')
                            ->options([
                                'Product' => 'Product',
                                'Category' => 'Category',
                            ])
                            ->required()
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                // Set default prefix based on entity
                                $prefixes = [
                                    'Product' => '/san-pham',
                                    'Category' => '/danh-muc',
                                ];
                                if (isset($prefixes[$state])) {
                                    $set('prefix', $prefixes[$state]);
                                }
                            }),
                        
                        Forms\Components\TextInput::make('entity_id')
                            ->label('Entity ID')
                            ->required()
                            ->numeric()
                            ->helperText('ID của record trong bảng entity'),
                        
                        Forms\Components\TextInput::make('key')
                            ->label('Slug Key')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Ví dụ: san-pham-cafe, danh-muc-cafe')
                            ->unique(ignoreRecord: true),
                        
                        Forms\Components\TextInput::make('prefix')
                            ->label('Prefix')
                            ->placeholder('/san-pham, /danh-muc, etc.')
                            ->helperText('Prefix cho URL (có thể để trống)')
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('entity')
                    ->label('Entity')
                    ->formatStateUsing(function ($state) {
                        $icons = [
                            'Product' => '📦',
                            'Category' => '🏷️',
                        ];
                        $icon = $icons[$state] ?? '📄';
                        return $icon . ' ' . $state;
                    })
                    ->sortable()
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('entity_id')
                    ->label('Entity ID')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('key')
                    ->label('Slug Key')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('prefix')
                    ->label('Prefix')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('full_path')
                    ->label('Full URL Path')
                    ->getStateUsing(fn (Slug $record): string => $record->full_path)
                    ->copyable()
                    ->copyMessage('Đã copy!')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('entity')
                    ->label('Entity')
                    ->options([
                        'Product' => 'Product',
                        'Category' => 'Category',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSlugs::route('/'),
            'create' => Pages\CreateSlug::route('/create'),
            'edit' => Pages\EditSlug::route('/{record}/edit'),
        ];
    }    
}
