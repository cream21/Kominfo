<?php

namespace App\Filament\Resources\BelanjaResource\Pages;

use App\Filament\Resources\BelanjaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBelanjas extends ListRecords
{
    protected static string $resource = BelanjaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
