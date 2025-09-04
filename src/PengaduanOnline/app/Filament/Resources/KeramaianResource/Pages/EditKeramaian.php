<?php

namespace App\Filament\Resources\KeramaianResource\Pages;

use App\Filament\Resources\KeramaianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKeramaian extends EditRecord
{
    protected static string $resource = KeramaianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
