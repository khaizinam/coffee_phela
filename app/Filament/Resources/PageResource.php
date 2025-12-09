<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationLabel = 'Trang';

    protected static ?string $modelLabel = 'Trang';

    protected static ?string $pluralModelLabel = 'Trang';

    protected static ?string $navigationGroup = 'Nội dung';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin trang')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên trang')
                            ->required()
                            ->maxLength(255)
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, $get) {
                                // Auto-generate slug từ name khi tạo mới
                                if (!$get('slug_key') || empty($get('slug_key'))) {
                                    $set('slug_key', \Illuminate\Support\Str::slug($state));
                                }
                            }),
                        
                        Forms\Components\TextInput::make('slug_key')
                            ->label('Slug SEO')
                            ->helperText('URL friendly: trang-chu. Tự động tạo từ tên khi tạo mới. Click icon refresh để tạo lại.')
                            ->maxLength(255)
                            ->reactive()
                            ->suffixAction(
                                Forms\Components\Actions\Action::make('refreshSlug')
                                    ->icon('heroicon-o-refresh')
                                    ->tooltip('Tạo lại slug từ tên trang')
                                    ->action(function ($livewire, $component) {
                                        $name = data_get($livewire->data, 'name');
                                        if ($name) {
                                            data_set($livewire->data, 'slug_key', \Illuminate\Support\Str::slug($name));
                                        }
                                    })
                            ),
                        
                        Forms\Components\TextInput::make('slug_prefix')
                            ->label('Prefix')
                            ->default(null)
                            ->helperText('Prefix = null cho SEO (slug trực tiếp: /ten-trang)')
                            ->maxLength(255)
                            ->hidden(),
                        
                        Forms\Components\FileUpload::make('banner_image')
                            ->label('Banner Image')
                            ->image()
                            ->directory('pages/banners')
                            ->visibility('public')
                            ->helperText('Upload hình ảnh banner cho trang'),
                        
                        Forms\Components\Select::make('template')
                            ->label('Template')
                            ->options(function () {
                                $templates = config('page-templates.templates', []);
                                $options = [];
                                foreach ($templates as $key => $template) {
                                    $options[$key] = $template['label'] . ' - ' . $template['description'];
                                }
                                return $options;
                            })
                            ->default(config('page-templates.default', 'dynamic'))
                            ->required()
                            ->helperText('Chọn template hiển thị cho trang này'),
                        
                        Forms\Components\Select::make('status')
                            ->label('Trạng thái')
                            ->options([
                                'active' => 'Hoạt động',
                                'inactive' => 'Không hoạt động',
                            ])
                            ->default('active')
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('SEO Metadata')
                    ->schema([
                        Forms\Components\TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->maxLength(255)
                            ->helperText('Tiêu đề SEO (tối đa 60 ký tự)'),
                        
                        Forms\Components\Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3)
                            ->helperText('Mô tả SEO (tối đa 160 ký tự)'),
                        
                        Forms\Components\FileUpload::make('meta_image')
                            ->label('Meta Image (OG Image)')
                            ->image()
                            ->directory('pages/meta')
                            ->visibility('public')
                            ->helperText('Hình ảnh hiển thị khi chia sẻ lên mạng xã hội (1200x630px)'),
                        
                        Forms\Components\Textarea::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->rows(2)
                            ->helperText('Từ khóa SEO, phân cách bằng dấu phẩy'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên trang')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->getStateUsing(function (Page $record) {
                        $slug = $record->slug()->first();
                        return $slug ? $slug->key : '—';
                    })
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('meta_title')
                    ->label('Meta Title')
                    ->limit(50)
                    ->tooltip(fn (?Page $record): ?string => $record?->meta_title),
                
                Tables\Columns\TextColumn::make('template')
                    ->label('Template')
                    ->formatStateUsing(function ($state) {
                        $templates = config('page-templates.templates', []);
                        return $templates[$state]['label'] ?? $state;
                    })
                    ->sortable(),
                
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Trạng thái')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'active' => 'Hoạt động',
                        'inactive' => 'Không hoạt động',
                        default => $state,
                    })
                    ->colors([
                        'success' => 'active',
                        'danger' => 'inactive',
                    ]),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Ngày cập nhật')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }    
}
