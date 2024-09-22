<?php

namespace App\Filament\Resources\TobaccoResource\Pages;

use App\Filament\Resources\TobaccoResource;
use EightyNine\ExcelImport\ExcelImportAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTobaccos extends ListRecords
{
    protected static string $resource = TobaccoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExcelImportAction::make()->color("primary"),
            Actions\CreateAction::make(),
        ];
    }
}
