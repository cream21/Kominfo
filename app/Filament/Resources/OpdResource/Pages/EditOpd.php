<?php

namespace App\Filament\Resources\OpdResource\Pages;

use App\Filament\Resources\OpdResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOpd extends EditRecord
{
    protected static string $resource = OpdResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
