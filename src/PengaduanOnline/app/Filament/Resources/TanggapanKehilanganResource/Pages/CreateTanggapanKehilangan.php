<?php

namespace App\Filament\Resources\TanggapanKehilanganResource\Pages;

use App\Filament\Resources\TanggapanKehilanganResource;
use App\Models\Kehilangan;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateTanggapanKehilangan extends CreateRecord
{
    protected static string $resource = TanggapanKehilanganResource::class;

    public $statusKehilangan;

    public function mount(): void
    {
        parent::mount();

        $id_kehilangan = request()->query('id_kehilangan');

        if ($id_kehilangan) {
            $kehilangan = Kehilangan::with('user')->find($id_kehilangan);

            if ($kehilangan) {
                $this->form->fill([
                    'nama_pelapor' => $kehilangan->user->name ?? '',
                    'nama_barang' => $kehilangan->nama_barang,
                    'lokasi_hilang' => $kehilangan->lokasi_hilang,
                    'tanggal_hilang' => $kehilangan->tanggal_hilang,
                    'deskripsi' => $kehilangan->deskripsi,
                    'id_kehilangan' => $kehilangan->id,
                    'foto' => $kehilangan->foto,
                    'status' => $kehilangan->status,
                    'user_id' => Auth::id(),
                ]);
            }
        }
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['id_kehilangan'])) {
            $data['id_kehilangan'] = request()->query('id_kehilangan');
        }

        if (empty($data['user_id'])) {
            $data['user_id'] = Auth::id();
        }

        $this->statusKehilangan = $data['status'] ?? 'belum_ditemukan';
        unset($data['status']);

        return $data;
    }

    protected function afterCreate(): void
    {
        if ($this->record->id_kehilangan && isset($this->statusKehilangan)) {
            $kehilangan = Kehilangan::find($this->record->id_kehilangan);

            if ($kehilangan) {
                $kehilangan->update(['status' => $this->statusKehilangan]);
            }
        }
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Tanggapan Kehilangan Berhasil Dibuat')
            ->body('Tanggapan Kehilangan berhasil dibuat.');
    }

    protected function getRedirectUrl(): string
    {
        return TanggapanKehilanganResource::getUrl('index');
    }
}
