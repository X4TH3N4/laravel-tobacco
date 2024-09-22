<?php

namespace App\Filament\Resources\MixResource\Pages;

use App\Filament\Resources\MixResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMix extends ViewRecord
{
    protected static string $resource = MixResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
