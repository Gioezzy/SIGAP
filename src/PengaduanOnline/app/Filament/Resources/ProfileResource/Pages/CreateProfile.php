<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateProfile extends CreateRecord
{
    protected static string $resource = ProfileResource::class;

    protected function getCreatedNotification(): ? Notification
    {
        return Notification::make()
            ->success()
            ->title('Profil Baru Dibuat')
            ->body('Profil baru telah berhasil dibuat.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
