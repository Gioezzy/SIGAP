<?php

namespace App\Filament\Resources\TanggapanKehilanganResource\Pages;

use App\Filament\Resources\TanggapanKehilanganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTanggapanKehilangans extends ListRecords
{
    protected static string $resource = TanggapanKehilanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
