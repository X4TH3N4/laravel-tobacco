<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AromaResource\Pages;
use App\Filament\Resources\AromaResource\RelationManagers;
use App\Models\Aroma;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AromaResource extends Resource
{
    protected static ?string $model = Aroma::class;

    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationGroup = 'Bilgi Girişi';
    protected static ?string $modelLabel = 'Aroma';
    protected static ?string $navigationLabel = "Aromalar";

    protected static ?string $pluralLabel = 'Aromalar';
    protected static ?int $navigationSort = 0;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $activeNavigationIcon = 'heroicon-s-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Aroma Oluştur')
                    ->description('Aşağıdaki bilgiyi doldurup bir aroma oluşturabilirsiniz.')
                    ->columns(2)
                    ->schema(components: [
                        Forms\Components\TextInput::make('name')
                        ->label('Aroma Adı')
                        ->validationAttribute('Aroma Adı')
                        ->string()
                        ->maxLength(255),])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Aroma Adı')
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
            'index' => Pages\ListAromas::route('/'),
            'create' => Pages\CreateAroma::route('/create'),
            'view' => Pages\ViewAroma::route('/{record}'),
            'edit' => Pages\EditAroma::route('/{record}/edit'),
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
