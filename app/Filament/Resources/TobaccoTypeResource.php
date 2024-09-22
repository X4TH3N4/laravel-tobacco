<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TobaccoTypeResource\Pages;
use App\Filament\Resources\TobaccoTypeResource\RelationManagers;
use App\Models\TobaccoType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TobaccoTypeResource extends Resource
{
    protected static ?string $model = TobaccoType::class;

    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationGroup = 'Bilgi Girişi';
    protected static ?string $modelLabel = 'Tütün Türü';
    protected static ?string $navigationLabel = "Tütün Türleri";

    protected static ?string $pluralLabel = 'Tütün Türleri';
    protected static ?int $navigationSort = 0;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $activeNavigationIcon = 'heroicon-s-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Tütün Türü Oluştur')
                    ->description('Aşağıdaki bilgiyi doldurarak tütün türü oluşturabilirsiniz.')
                    ->columns(2)
                    ->schema(components: [             Forms\Components\TextInput::make('name')
                        ->label('Tütün Türü')
                        ->validationAttribute('Tütün Türü')
                        ->string()
                        ->maxLength(255),])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Tütün Türü')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListTobaccoTypes::route('/'),
            'create' => Pages\CreateTobaccoType::route('/create'),
            'view' => Pages\ViewTobaccoType::route('/{record}'),
            'edit' => Pages\EditTobaccoType::route('/{record}/edit'),
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
