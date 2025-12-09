<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use App\Services\GalleryService;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $slug = 'galleries';

    protected static ?string $navigationIcon = 'heroicon-o-photograph';

    protected static ?string $navigationLabel = 'Thư viện ảnh';

    protected static ?string $modelLabel = 'Ảnh';

    protected static ?string $pluralModelLabel = 'Thư viện ảnh';

    protected static ?string $navigationGroup = 'Nội dung';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin ảnh')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên ảnh')
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('file_name')
                            ->label('Tên file')
                            ->disabled()
                            ->dehydrated(false),
                        
                        Forms\Components\TextInput::make('url')
                            ->label('URL')
                            ->disabled()
                            ->dehydrated(false)
                            ->formatStateUsing(fn ($record) => $record ? $record->full_url : null),
                        
                        Forms\Components\Select::make('status')
                            ->label('Trạng thái')
                            ->options([
                                'active' => 'Hoạt động',
                                'inactive' => 'Không hoạt động',
                            ])
                            ->default('active')
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_preview')
                    ->label('Ảnh')
                    ->getStateUsing(fn ($record) => $record->full_thumb_url ?: $record->full_url)
                    ->circular()
                    ->size(60),
                
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('file_name')
                    ->label('File name')
                    ->searchable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('mime_type')
                    ->label('Loại file')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('size')
                    ->label('Kích thước')
                    ->formatStateUsing(fn ($state) => $state ? number_format($state / 1024, 2) . ' KB' : '-')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('width')
                    ->label('Rộng')
                    ->formatStateUsing(fn ($state) => $state ? $state . 'px' : '-'),
                
                Tables\Columns\TextColumn::make('height')
                    ->label('Cao')
                    ->formatStateUsing(fn ($state) => $state ? $state . 'px' : '-'),
                
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Trạng thái')
                    ->colors([
                        'success' => 'active',
                        'danger' => 'inactive',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'active' => 'Hoạt động',
                        'inactive' => 'Không hoạt động',
                        default => $state,
                    }),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'active' => 'Hoạt động',
                        'inactive' => 'Không hoạt động',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->action(function (Gallery $record, GalleryService $galleryService) {
                        $galleryService->delete($record);
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Xóa ảnh')
                    ->modalSubheading('Bạn có chắc chắn muốn xóa ảnh này? File và record sẽ bị xóa vĩnh viễn.')
                    ->modalButton('Xóa')
                    ->successNotificationTitle('Đã xóa ảnh thành công'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->action(function ($records, GalleryService $galleryService) {
                        foreach ($records as $record) {
                            $galleryService->delete($record);
                        }
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Xóa nhiều ảnh')
                    ->modalSubheading('Bạn có chắc chắn muốn xóa các ảnh đã chọn? Files và records sẽ bị xóa vĩnh viễn.')
                    ->modalButton('Xóa tất cả')
                    ->successNotificationTitle('Đã xóa thành công'),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'active')->count();
    }    
}
