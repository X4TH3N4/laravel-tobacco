<?php

namespace App\Filament\Resources\MixResource\Pages;

use App\Filament\Resources\MixResource;
use EightyNine\ExcelImport\ExcelImportAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMixes extends ListRecords
{
    protected static string $resource = MixResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExcelImportAction::make()->color("primary"),
            Actions\CreateAction::make(),
        ];
    }
}
