<?php

namespace App\Filament\Resources\PejabatResource\Pages;

use App\Filament\Resources\PejabatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPejabat extends ViewRecord
{
    protected static string $resource = PejabatResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
