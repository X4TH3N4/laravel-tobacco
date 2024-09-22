<?php

namespace App\Filament\Resources\TobaccoResource\Pages;

use App\Filament\Resources\TobaccoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTobacco extends ViewRecord
{
    protected static string $resource = TobaccoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
