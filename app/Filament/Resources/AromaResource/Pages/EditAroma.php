<?php

namespace App\Filament\Resources\AromaResource\Pages;

use App\Filament\Resources\AromaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAroma extends EditRecord
{
    protected static string $resource = AromaResource::class;

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
