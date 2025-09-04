<?php

namespace App\Filament\Resources\KehilanganResource\Pages;

use App\Filament\Resources\KehilanganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKehilangans extends ListRecords
{
    protected static string $resource = KehilanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
