<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = 'Sản phẩm';

    protected static ?string $modelLabel = 'Sản phẩm';

    protected static ?string $pluralModelLabel = 'Sản phẩm';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin cơ bản')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên sản phẩm')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2)
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, $get) {
                                // Auto-generate slug từ name khi tạo mới
                                if (!$get('slug_key') || empty($get('slug_key'))) {
                                    $set('slug_key', \Illuminate\Support\Str::slug($state));
                                }
                            }),
                        
                        Forms\Components\TextInput::make('slug_key')
                            ->label('Slug SEO')
                            ->helperText('URL friendly: san-pham-cafe. Tự động tạo từ tên khi tạo mới. Click icon refresh để tạo lại.')
                            ->maxLength(255)
                            ->reactive()
                            ->suffixAction(
                                Forms\Components\Actions\Action::make('refreshSlug')
                                    ->icon('heroicon-o-refresh')
                                    ->tooltip('Tạo lại slug từ tên sản phẩm')
                                    ->action(function ($livewire, $component) {
                                        $name = data_get($livewire->data, 'name');
                                        if ($name) {
                                            data_set($livewire->data, 'slug_key', \Illuminate\Support\Str::slug($name));
                                        }
                                    })
                            )
                            ->columnSpan(2),
                        
                        Forms\Components\TextInput::make('slug_prefix')
                            ->label('Prefix')
                            ->default(null)
                            ->helperText('Prefix = null cho SEO (slug trực tiếp: /ten-san-pham)')
                            ->maxLength(255)
                            ->hidden(),
                        
                        Forms\Components\Textarea::make('description')
                            ->label('Mô tả ngắn')
                            ->rows(3)
                            ->columnSpan(2),
                        
                        Forms\Components\RichEditor::make('content')
                            ->label('Nội dung chi tiết (HTML)')
                            ->toolbarButtons([
                                'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ])
                            ->columnSpan(2),
                        
                        Forms\Components\TextInput::make('price')
                            ->label('Giá')
                            ->numeric()
                            ->prefix('₫')
                            ->required()
                            ->default(0),
                        
                        Forms\Components\Select::make('status')
                            ->label('Trạng thái')
                            ->options([
                                'published' => 'Đã xuất bản',
                                'draft' => 'Bản nháp',
                                'unactive' => 'Không hoạt động',
                            ])
                            ->default('draft')
                            ->required(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Hình ảnh')
                    ->schema([
                        Forms\Components\Placeholder::make('gallery_button_info')
                            ->label('')
                            ->content(new \Illuminate\Support\HtmlString('
                                <div class="mb-4 p-3 bg-gray-50 rounded-lg border border-gray-200">
                                    <button type="button" 
                                            id="openGalleryBtn"
                                            onclick="if(window.openMediaGallery) { window.openMediaGallery(window.currentProductIdForGallery || null); } else { alert(\'Gallery chưa sẵn sàng. Vui lòng refresh trang.\'); } return false;"
                                            class="inline-flex items-center justify-center px-4 py-2 bg-primary-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-700 active:bg-primary-900 focus:outline-none focus:border-primary-900 focus:ring ring-primary-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        Chọn ảnh từ Gallery
                                    </button>
                                    <p class="mt-2 text-sm text-gray-600">Chọn ảnh từ thư viện ảnh đã có sẵn để thêm vào gallery sản phẩm</p>
                                </div>
                            '))
                            ->columnSpanFull(),
                        
                        Forms\Components\Placeholder::make('image_selector')
                            ->label('Hình đại diện')
                            ->content(new \Illuminate\Support\HtmlString('
                                <div class="space-y-3">
                                    <div class="flex items-center gap-3">
                                        <button type="button" 
                                                id="selectThumbnailFromGallery"
                                                class="inline-flex items-center justify-center px-4 py-2 bg-primary-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-700 active:bg-primary-900 focus:outline-none focus:border-primary-900 focus:ring ring-primary-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            Chọn từ Gallery
                                        </button>
                                    </div>
                                    <div id="selectedThumbnailPreview" class="hidden">
                                        <div class="relative inline-block">
                                            <img id="thumbnailPreviewImage" src="" alt="Thumbnail preview" class="w-32 h-32 object-cover rounded-lg border border-gray-300">
                                            <button type="button" 
                                                    onclick="window.clearSelectedThumbnail && window.clearSelectedThumbnail()"
                                                    class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600">
                                                ×
                                            </button>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-2">Ảnh đã chọn</p>
                                    </div>
                                </div>
                            '))
                            ->columnSpan(1),
                        
                        Forms\Components\TextInput::make('image')
                            ->label('Path hình đại diện')
                            ->helperText('Path tương đối: /storage/galleries/xxx.webp (tự động điền khi chọn từ Gallery)')
                            ->reactive()
                            ->columnSpan(1),
                        
                    ]),

                Forms\Components\Section::make('Danh mục')
                    ->schema([
                        Forms\Components\BelongsToManyMultiSelect::make('categories')
                            ->label('Danh mục')
                            ->relationship('categories', 'name')
                            ->preload()
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                
                Tables\Columns\ImageColumn::make('image_url')
                    ->label('Hình đại diện')
                    ->getStateUsing(fn ($record) => $record->image_url ?: null)
                    ->url(fn ($record) => $record->image_url ?: '#')
                    ->circular()
                    ->visibleFrom('md'),
                
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên sản phẩm')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('price')
                    ->label('Giá')
                    ->money('VND')
                    ->formatStateUsing(fn ($state) => number_format($state, 0, ',', '.') . ' ₫')
                    ->sortable(),
                
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Trạng thái')
                    ->colors([
                        'success' => 'published',
                        'warning' => 'draft',
                        'danger' => 'unactive',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'published' => 'Đã xuất bản',
                        'draft' => 'Bản nháp',
                        'unactive' => 'Không hoạt động',
                        default => $state,
                    }),
                
                Tables\Columns\TextColumn::make('categories.name')
                    ->label('Danh mục')
                    ->formatStateUsing(function ($state, $record) {
                        return $record->categories->pluck('name')->join(', ');
                    })
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'published' => 'Đã xuất bản',
                        'draft' => 'Bản nháp',
                        'unactive' => 'Không hoạt động',
                    ]),
                
                Tables\Filters\SelectFilter::make('categories')
                    ->label('Danh mục')
                    ->relationship('categories', 'name'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }    
}
