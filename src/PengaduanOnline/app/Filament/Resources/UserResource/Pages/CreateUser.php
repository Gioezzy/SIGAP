<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        // kirim email verifikasi ke users untuk verifikasi email
        // $user->sendEmailVerificationNotification(); belum dipakai untuk saat ini
        return $user;
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Pengguna Baru Dibuat')
            ->body('Pengguna baru telah berhasil dibuat.');
    }

    protected function getRedirectUrl(): string
    {
        return UserResource::getUrl('index');
    }
}
