<?php

namespace App\Filament\Resources\TobaccoResource\Pages;

use App\Filament\Resources\TobaccoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTobacco extends EditRecord
{
    protected static string $resource = TobaccoResource::class;

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
