<?php

namespace App\Filament\Resources\AromaResource\Pages;

use App\Filament\Resources\AromaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAroma extends ViewRecord
{
    protected static string $resource = AromaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
