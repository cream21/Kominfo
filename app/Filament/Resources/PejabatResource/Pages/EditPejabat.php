<?php

namespace App\Filament\Resources\PejabatResource\Pages;

use App\Filament\Resources\PejabatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPejabat extends EditRecord
{
    protected static string $resource = PejabatResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
