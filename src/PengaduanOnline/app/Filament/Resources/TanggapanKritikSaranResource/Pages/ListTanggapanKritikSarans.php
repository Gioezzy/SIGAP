<?php

namespace App\Filament\Resources\TanggapanKritikSaranResource\Pages;

use App\Filament\Resources\TanggapanKritikSaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTanggapanKritikSarans extends ListRecords
{
    protected static string $resource = TanggapanKritikSaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
