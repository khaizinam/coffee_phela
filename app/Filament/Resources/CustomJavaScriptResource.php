<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomJavaScriptResource\Pages;
use App\Models\CustomJavaScript;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CustomJavaScriptResource extends Resource
{
    protected static ?string $model = CustomJavaScript::class;

    protected static ?string $navigationIcon = 'heroicon-o-code';

    protected static ?string $navigationLabel = 'Custom JavaScript';

    protected static ?string $modelLabel = 'Custom JavaScript';

    protected static ?string $pluralModelLabel = 'Custom JavaScript';

    protected static ?string $navigationGroup = 'Cài đặt';

    public static function getSlug(): string
    {
        return 'custom-javascripts';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('position')
                    ->label('Vị trí')
                    ->options([
                        'header' => 'Header (trong <head>)',
                        'body_start' => 'Body Start (đầu <body>)',
                        'body_end' => 'Body End (cuối <body>)',
                    ])
                    ->required()
                    ->disabled(fn ($record) => $record !== null) // Disable khi edit
                    ->helperText('Mỗi vị trí chỉ có 1 record. Không thể thay đổi sau khi tạo.'),

                Forms\Components\Textarea::make('code')
                    ->label('Mã JavaScript/HTML')
                    ->rows(15)
                    ->helperText('Nhập mã JavaScript hoặc HTML. Ví dụ: <script>...</script> hoặc code trực tiếp. Để trống để vô hiệu hóa.')
                    ->columnSpanFull(),

                Forms\Components\Select::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'active' => 'Hoạt động',
                        'inactive' => 'Không hoạt động',
                    ])
                    ->default('active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('position')
                    ->label('Vị trí')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'header' => 'Header (trong <head>)',
                        'body_start' => 'Body Start (đầu <body>)',
                        'body_end' => 'Body End (cuối <body>)',
                        default => $state,
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('code')
                    ->label('Code')
                    ->limit(50)
                    ->tooltip(fn (?CustomJavaScript $record): ?string => $record?->code)
                    ->default('—'),

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

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Cập nhật')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('position')
                    ->label('Vị trí')
                    ->options([
                        'header' => 'Header',
                        'body_start' => 'Body Start',
                        'body_end' => 'Body End',
                    ]),
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
            ->defaultSort('position');
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
            'index' => Pages\ListCustomJavascripts::route('/'),
            'create' => Pages\CreateCustomJavaScript::route('/create'),
            'edit' => Pages\EditCustomJavaScript::route('/{record}/edit'),
        ];
    }
}
