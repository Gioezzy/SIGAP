<?php

namespace App\Filament\Resources\KehilanganResource\Pages;

use App\Filament\Resources\KehilanganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKehilangan extends EditRecord
{
    protected static string $resource = KehilanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
