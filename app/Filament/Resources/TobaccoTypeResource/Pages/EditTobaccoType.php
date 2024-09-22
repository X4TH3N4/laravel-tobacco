<?php

namespace App\Filament\Resources\TobaccoTypeResource\Pages;

use App\Filament\Resources\TobaccoTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTobaccoType extends EditRecord
{
    protected static string $resource = TobaccoTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
