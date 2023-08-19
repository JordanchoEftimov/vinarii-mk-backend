<?php

namespace App\Filament\Resources\WineryResource\Pages;

use App\Filament\Resources\WineryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWineries extends ManageRecords
{
    protected static string $resource = WineryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
