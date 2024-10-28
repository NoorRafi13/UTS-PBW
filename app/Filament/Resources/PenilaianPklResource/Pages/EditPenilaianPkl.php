<?php

namespace App\Filament\Resources\PenilaianPklResource\Pages;

use App\Filament\Resources\PenilaianPklResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenilaianPkl extends EditRecord
{
    protected static string $resource = PenilaianPklResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
