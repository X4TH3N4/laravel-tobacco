<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TobaccoResource\Pages;
use App\Filament\Resources\TobaccoResource\RelationManagers;
use App\Models\Tobacco;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\t;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationGroup;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class TobaccoResource extends Resource
{
    protected static ?string $model = Tobacco::class;

    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationGroup = 'Ürün Girişi';
    protected static ?string $modelLabel = 'Tütün';
    protected static ?string $navigationLabel = "Tütünler";

    protected static ?string $pluralLabel = 'Tütünler';
    protected static ?int $navigationSort = 0;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $activeNavigationIcon = 'heroicon-s-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make("Tütün Ekle")
                    ->description('Aşağıdaki verileri doldurarak sisteme tütün ekleyebilirsiniz.')
                    ->columns(2)
                    ->schema(components: [
                        Forms\Components\TextInput::make('name')
                            ->label('Tütün Adı')
                            ->readOnly()
                            ->validationAttribute('Tütün Adı')
                            ->string()
                            ->maxLength(255),
                        Select::make('type_id')
                            ->relationship('type', 'name')
                            ->live()
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->label('Tür')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Tütün Türü')
                                    ->validationAttribute('Tütün Türü')
                                    ->string()
                                    ->maxLength(255),
                            ])
                            ->editOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Tütün Türü')
                                    ->validationAttribute('Tütün Türü')
                                    ->string()
                                    ->maxLength(255),
                            ])
                            ->required(),
                        Select::make('brand_id')
                            ->relationship('brand', 'name')
                            ->live()
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->label('Marka')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Marka Adı')
                                    ->validationAttribute('Marka Adı')
                                    ->string()
                                    ->maxLength(255),
                            ])
                            ->editOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Marka Adı')
                                    ->validationAttribute('Marka Adı')
                                    ->string()
                                    ->maxLength(255),
                            ])
                            ->required(),
                        Select::make('aromas')
                            ->relationship('aromas', 'name')
                            ->live()
                            ->preload()
                            ->searchable()
                            ->multiple()
                            ->native(false)
                            ->label('Aroma')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Aroma Adı')
                                    ->validationAttribute('Aroma Adı')
                                    ->string()
                                    ->maxLength(255),
                            ])
                            ->editOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Aroma Adı')
                                    ->validationAttribute('Aroma Adı')
                                    ->string()
                                    ->maxLength(255),
                            ])
                            ->required(),
                        Select::make('package_type_id')
                            ->relationship('packageType', 'name')
                            ->live()
                            ->preload()
                            ->searchable()
                            ->native(false)
                            ->label('Paket Şekli')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Paket Şekli')
                                    ->validationAttribute('Paket Şekli')
                                    ->maxLength(255),
                            ])
                            ->editOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Paket Şekli')
                                    ->validationAttribute('Paket Şekli')
                                    ->maxLength(255),
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('weight')
                            ->label('Ağırlık')
                            ->validationAttribute('Ağırlık')
                            ->suffix('gr')
                            ->numeric(),
                        Select::make('strength')
                            ->label('Yoğunluk / Sertlik')
                            ->validationAttribute('Yoğunluk / Sertlik')
                            ->native(false)
                            ->options([
                                1 => '1 (Hafif)',
                                2 => '2 (Hafif)',
                                3 => '3 (Hafif)',
                                4 => '4 (Orta)',
                                5 => '5 (Orta)',
                                6 => '6 (Orta)',
                                7 => '7 (Orta)',
                                8 => '8 (Ağır)',
                                9 => '9 (Ağır)',
                                10 => '10 (Ağır)',
                            ]),
                        Forms\Components\Textarea::make('description')
                            ->label('Açıklama')
                            ->validationAttribute('Açıklama')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('stock_quantity')
                            ->label('Stok Adeti')
                            ->validationAttribute('Stok Adeti')
                            ->prefix('x')
                            ->numeric(),
                        Forms\Components\TextInput::make('price')
                            ->numeric()
                            ->label('Fiyat')
                            ->validationAttribute('Fiyat')
                            ->prefix('₺'),
                        Select::make('score')
                            ->native(false)
                            ->label('Popülerlik')
                            ->validationAttribute('Popülerlik')
                            ->options([
                                0 => '(0/5)',
                                1 => '⭐ (1/5)',
                                2 => '⭐⭐ (2/5)',
                                3 => '⭐⭐⭐ (3/5)',
                                4 => '⭐⭐⭐⭐ (4/5)',
                                5 => '⭐⭐⭐⭐⭐ (5/5)',
                            ])
                            ->default(5),

                        Forms\Components\Section::make('Resim Yükle')
                            ->description('Tütünün resmilerini yükleyin.')
                            ->schema(components: [
                                Forms\Components\SpatieMediaLibraryFileUpload::make('tobacco_picture')
                                    ->collection('tobacco_pictures')
                                    ->multiple()
                                    ->responsiveImages()
                                    ->image()
                                    ->imageEditor()
                                    ->label('Tütün Resimleri')
                                    ->optimize('webp')
                                    ->downloadable()
                                    ->openable()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/vnd.wap.wbmp'])
                                    ->maxSize(102400)
                                    ->reorderable()
                                    ->deletable()
                                    ->imageEditorAspectRatios([null, '16:9', '4:3', '1:1',])
                                    ->appendFiles()
                                    ->previewable(),
                            ])

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tütün Adı')
                    ->placeholder('Belirtilmedi')
                    ->default('Belirtilmedi')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('type.name')
                    ->label('Tütün Türü')
                    ->placeholder('Belirtilmedi')
                    ->default('Belirtilmedi')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Marka')
                    ->placeholder('Belirtilmedi')
                    ->default('Belirtilmedi')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('aromas.name')
                    ->label('Aroma')
                    ->placeholder('Belirtilmedi')
                    ->default('Belirtilmedi')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('packageType.name')
                    ->label('Paketleme')
                    ->placeholder('Belirtilmedi')
                    ->default('Belirtilmedi')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('weight')
                    ->label('Ağırlık')
                    ->placeholder('Belirtilmedi')
                    ->default('Belirtilmedi')
                    ->numeric()
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('strength')
                    ->label('Yoğunluk / Sertlik'),
                Tables\Columns\TextColumn::make('stock_quantity')
                    ->label('Stok Adedi')
                    ->placeholder('Belirtilmedi')
                    ->default('Belirtilmedi')
                    ->numeric()
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Fiyat')
                    ->placeholder('Belirtilmedi')
                    ->default('Belirtilmedi')
                    ->money('try')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('score')
                    ->label('Popülerlik')
                    ->suffix('/5'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ForceDeleteAction::make()])
                    ->label('İşlemler')
                    ->color('info')
                    ->icon('heroicon-m-ellipsis-vertical')
                    ->size(ActionSize::Small)
                    ->button(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make(),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationGroup::make('Tütün İlişkileri', [
                RelationManagers\AromasRelationManager::make(),
                RelationManagers\BrandRelationManager::make(),
            ])

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTobaccos::route('/'),
            'create' => Pages\CreateTobacco::route('/create'),
            'view' => Pages\ViewTobacco::route('/{record}'),
            'edit' => Pages\EditTobacco::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

}
