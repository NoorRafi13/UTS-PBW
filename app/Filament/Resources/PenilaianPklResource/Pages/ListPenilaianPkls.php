<?php

namespace App\Filament\Resources\PenilaianPklResource\Pages;

use App\Filament\Resources\PenilaianPklResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenilaianPkls extends ListRecords
{
    protected static string $resource = PenilaianPklResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
