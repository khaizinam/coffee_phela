<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Models\Menu;
use App\Models\Slug;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-menu';

    protected static ?string $navigationLabel = 'Menu Header';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin cơ bản')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Tên menu')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),
                        
                        Forms\Components\Select::make('parent_id')
                            ->label('Menu cha')
                            ->options(function (?Menu $record) {
                                $query = Menu::where('status', 'active');
                                if ($record) {
                                    $query->where('id', '!=', $record->id);
                                }
                                return $query->pluck('name', 'id');
                            })
                            ->searchable()
                            ->placeholder('Chọn menu cha (để trống nếu là menu chính)')
                            ->helperText('Để trống nếu đây là menu chính (level 1)')
                            ->columnSpan(2),
                        
                        Forms\Components\Select::make('link_type')
                            ->label('Loại link')
                            ->options([
                                'internal' => 'Internal (Nội bộ)',
                                'external' => 'External (Bên ngoài)',
                            ])
                            ->default('internal')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('link', null))
                            ->columnSpan(1),
                        
                        Forms\Components\Select::make('target')
                            ->label('Target')
                            ->options([
                                '_self' => 'Cùng tab (_self)',
                                '_blank' => 'Tab mới (_blank)',
                            ])
                            ->default('_self')
                            ->required()
                            ->columnSpan(1),
                        
                        Forms\Components\Select::make('link')
                            ->label('Internal Link (Slug)')
                            ->options(function () {
                                // Lấy tất cả slugs để chọn
                                return Slug::all()
                                    ->mapWithKeys(function ($slug) {
                                        $entityName = class_basename($slug->entity);
                                        $key = $slug->key;
                                        return [$key => "{$entityName}: /{$key}"];
                                    })
                                    ->toArray();
                            })
                            ->searchable()
                            ->placeholder('Chọn slug từ hệ thống')
                            ->visible(fn (callable $get) => $get('link_type') === 'internal')
                            ->helperText('Chọn slug từ Product hoặc Category')
                            ->columnSpan(2),
                        
                        Forms\Components\TextInput::make('link')
                            ->label('External Link (URL)')
                            ->url()
                            ->placeholder('https://example.com hoặc /path')
                            ->visible(fn (callable $get) => $get('link_type') === 'external')
                            ->required(fn (callable $get) => $get('link_type') === 'external')
                            ->helperText('Nhập URL đầy đủ hoặc đường dẫn tương đối')
                            ->columnSpan(2),
                        
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Thứ tự sắp xếp')
                            ->numeric()
                            ->default(0)
                            ->required()
                            ->helperText('Số nhỏ hơn sẽ hiển thị trước')
                            ->columnSpan(1),
                        
                        Forms\Components\Select::make('status')
                            ->label('Trạng thái')
                            ->options([
                                'active' => 'Hoạt động',
                                'inactive' => 'Không hoạt động',
                            ])
                            ->default('active')
                            ->required()
                            ->columnSpan(1),
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
                
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên menu')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Menu cha')
                    ->default('—')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('link_type')
                    ->label('Loại link')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'internal' => 'Internal',
                        'external' => 'External',
                        default => $state,
                    })
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('link')
                    ->label('Link')
                    ->limit(50)
                    ->tooltip(fn (?Menu $record): ?string => $record?->link)
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('url')
                    ->label('URL đầy đủ')
                    ->getStateUsing(fn (Menu $record) => $record->url)
                    ->limit(50)
                    ->tooltip(fn (?Menu $record): ?string => $record?->url),
                
                Tables\Columns\TextColumn::make('target')
                    ->label('Target')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Thứ tự')
                    ->sortable(),
                
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
                Tables\Filters\SelectFilter::make('parent_id')
                    ->label('Menu cha')
                    ->options(Menu::whereNull('parent_id')->pluck('name', 'id'))
                    ->placeholder('Tất cả'),
                
                Tables\Filters\SelectFilter::make('link_type')
                    ->options([
                        'internal' => 'Internal',
                        'external' => 'External',
                    ])
                    ->placeholder('Tất cả'),
                
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Hoạt động',
                        'inactive' => 'Không hoạt động',
                    ])
                    ->placeholder('Tất cả'),
            ])
            ->defaultSort('sort_order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }    
}
