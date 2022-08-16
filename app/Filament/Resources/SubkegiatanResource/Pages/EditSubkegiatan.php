<?php

namespace App\Filament\Resources\SubkegiatanResource\Pages;

use App\Filament\Resources\SubkegiatanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubkegiatan extends EditRecord
{
    protected static string $resource = SubkegiatanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
