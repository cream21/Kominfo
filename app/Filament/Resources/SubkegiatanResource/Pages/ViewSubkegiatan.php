<?php

namespace App\Filament\Resources\SubkegiatanResource\Pages;

use App\Filament\Resources\SubkegiatanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSubkegiatan extends ViewRecord
{
    protected static string $resource = SubkegiatanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
