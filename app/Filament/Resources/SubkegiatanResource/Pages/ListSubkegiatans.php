<?php

namespace App\Filament\Resources\SubkegiatanResource\Pages;

use App\Filament\Resources\SubkegiatanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubkegiatans extends ListRecords
{
    protected static string $resource = SubkegiatanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
