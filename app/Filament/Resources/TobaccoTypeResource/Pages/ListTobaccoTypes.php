<?php

namespace App\Filament\Resources\TobaccoTypeResource\Pages;

use App\Filament\Resources\TobaccoTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTobaccoTypes extends ListRecords
{
    protected static string $resource = TobaccoTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
