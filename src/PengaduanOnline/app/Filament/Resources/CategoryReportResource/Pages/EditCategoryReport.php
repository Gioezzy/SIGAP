<?php

namespace App\Filament\Resources\CategoryReportResource\Pages;

use App\Filament\Resources\CategoryReportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryReport extends EditRecord
{
    protected static string $resource = CategoryReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
