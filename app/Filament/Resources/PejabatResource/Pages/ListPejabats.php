<?php

namespace App\Filament\Resources\PejabatResource\Pages;

use App\Filament\Resources\PejabatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPejabats extends ListRecords
{
    protected static string $resource = PejabatResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
