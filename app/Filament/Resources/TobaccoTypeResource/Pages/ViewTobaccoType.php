<?php

namespace App\Filament\Resources\TobaccoTypeResource\Pages;

use App\Filament\Resources\TobaccoTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTobaccoType extends ViewRecord
{
    protected static string $resource = TobaccoTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
