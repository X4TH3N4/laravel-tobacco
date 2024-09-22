<?php

namespace App\Filament\Resources\MixResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TobaccosRelationManager extends RelationManager
{
    protected static string $relationship = 'tobaccos';

    protected static ?string $title = 'Tütünler';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $modelLabel = 'Tütün';

    protected static ?string $pluralLabel = 'Tütünler';

    protected static ?string $label = 'Tütün';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make("Tütün Ekle")
                    ->description('Aşağıdaki verileri doldurarak sisteme tütün ekleyebilirsiniz.')
                    ->columns(2)
                    ->schema(components: [
                        Forms\Components\TextInput::make('name')
                            ->label('Tütün Adı')
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
                        Select::make('aroma_id')
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
                    ]),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
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
                Tables\Filters\TrashedFilter::make()
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]));
    }
}
