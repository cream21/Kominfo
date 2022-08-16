<?php

namespace App\Filament\Resources\BelanjaResource\Pages;

use App\Filament\Resources\BelanjaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBelanja extends ViewRecord
{
    protected static string $resource = BelanjaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
