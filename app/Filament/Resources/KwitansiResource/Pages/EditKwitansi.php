<?php

namespace App\Filament\Resources\KwitansiResource\Pages;

use App\Filament\Resources\KwitansiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKwitansi extends EditRecord
{
    protected static string $resource = KwitansiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
