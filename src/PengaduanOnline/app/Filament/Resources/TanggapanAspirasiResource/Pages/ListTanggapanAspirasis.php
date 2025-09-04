<?php

namespace App\Filament\Resources\TanggapanAspirasiResource\Pages;

use App\Filament\Resources\TanggapanAspirasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTanggapanAspirasis extends ListRecords
{
    protected static string $resource = TanggapanAspirasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
