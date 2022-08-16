<?php

namespace App\Filament\Resources\BelanjaResource\Pages;

use App\Filament\Resources\BelanjaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBelanja extends EditRecord
{
    protected static string $resource = BelanjaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
