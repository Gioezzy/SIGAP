<?php

namespace App\Filament\Resources\TanggapanKeramaianResource\Pages;

use App\Filament\Resources\TanggapanKeramaianResource;
use App\Models\Keramaian;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CreateTanggapanKeramaian extends CreateRecord
{
    protected static string $resource = TanggapanKeramaianResource::class;

    public $statusKeramaian;

    public function mount(): void
    {
        Log::debug('MOUNT dipanggil');
        parent::mount();

        $id_keramaian = request()->query('id_keramaian');

        if ($id_keramaian) {
            $keramaian = Keramaian::with('user')->find($id_keramaian);

            if ($keramaian) {
                $this->form->fill([
                    'nama_pelapor' => $keramaian->user->name ?? '',
                    'nama_acara' => $keramaian->nama_acara,
                    'lokasi_acara' => $keramaian->lokasi_acara,
                    'tanggal_acara' => $keramaian->tanggal_acara,
                    'waktu_acara' => $keramaian->waktu_acara,
                    'status' => $keramaian->status,
                    'id_keramaian' => $keramaian->id,
                    'user_id' => Auth::id(),
                ]);
            }
        }
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        Log::debug('Form data sebelum create:', $data);

        if (empty($data['id_keramaian'])) {
            $data['id_keramaian'] = request()->query('id_keramaian');
        }

        if (empty($data['user_id'])) {
            $data['user_id'] = Auth::id();
        }

        $this->statusKeramaian = $data['status'] ?? 'menunggu';
        unset($data['status']);

        return $data;
    }

    protected function afterCreate(): void
    {
        Log::debug('Ngentot', [
            'record' => $this->record->toArray(),
            'statusKeramaian' => $this->statusKeramaian,
        ]);
        if ($this->record->id_keramaian && isset($this->statusKeramaian)) {
            $keramaian = Keramaian::find($this->record->id_keramaian);

            if ($keramaian) {
                $keramaian->update(['status' => $this->statusKeramaian]);
            }
        }
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Tanggapan Keramaian Berhasil Dibuat')
            ->body('Tanggapan Keramaian Berhasil Dibuat');
    }

    protected function getRedirectUrl(): string
    {
        return TanggapanKeramaianResource::getUrl('index');
    }
}
