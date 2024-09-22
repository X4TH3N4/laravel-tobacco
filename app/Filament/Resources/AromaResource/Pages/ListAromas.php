<?php

namespace App\Filament\Resources\AromaResource\Pages;

use App\Filament\Resources\AromaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAromas extends ListRecords
{
    protected static string $resource = AromaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
