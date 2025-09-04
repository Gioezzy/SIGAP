<?php

namespace App\Filament\Resources\TanggapanKeramaianResource\Pages;

use App\Filament\Resources\TanggapanKeramaianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTanggapanKeramaians extends ListRecords
{
    protected static string $resource = TanggapanKeramaianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
