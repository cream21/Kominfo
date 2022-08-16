<?php

namespace App\Filament\Resources\KwitansiResource\Pages;

use App\Filament\Resources\KwitansiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKwitansis extends ListRecords
{
    protected static string $resource = KwitansiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
