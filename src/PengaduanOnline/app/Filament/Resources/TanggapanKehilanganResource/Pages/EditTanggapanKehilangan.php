<?php

namespace App\Filament\Resources\TanggapanKehilanganResource\Pages;

use App\Filament\Resources\TanggapanKehilanganResource;
use App\Models\Kehilangan;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditTanggapanKehilangan extends EditRecord
{
    protected static string $resource = TanggapanKehilanganResource::class;

    public $statusKehilangan;

    /**
     * Mount the page with the given record.
     */
    public function mount(int|string $record): void
    {
        parent::mount($record);

        // load data kehilangan yang terkait
        $tanggapan = $this->getRecord();

        if ($tanggapan && $tanggapan->kehilangan) {
            $kehilangan = $tanggapan->kehilangan()->with('user')->first();

            if ($kehilangan) {
                // Isi form dengan data kehilangan yang terkait
                $this->form->fill([
                    'nama_pelapor' => $kehilangan->user->name ?? '',
                    'nama_barang' => $kehilangan->nama_barang,
                    'lokasi_hilang' => $kehilangan->lokasi_hilang,
                    'tanggal_hilang' => $kehilangan->tanggal_hilang,
                    'deskripsi' => $kehilangan->deskripsi,
                    'foto' => $kehilangan->foto,
                    'id_kehilangan' => $kehilangan->id,
                    'status' => $kehilangan->status, // Status dari kehilangan
                    'user_id' => Auth::id(),
                ]);
            }
        }
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Simpan status yang akan diupdate ke tabel kehilangan
        $this->statusKehilangan = $data['status'] ?? null;

        // Hapus status dari data karena tidak ada di tabel tanggapan_kehilangans
        unset($data['status']);

        return $data;
    }

    protected function afterSave(): void
    {
        // Update status di tabel kehilangan setelah tanggapan berhasil diupdate
        if ($this->record->id_kehilangan && isset($this->statusKehilangan)) {
            $kehilangan = Kehilangan::find($this->record->id_kehilangan);

            if ($kehilangan && $kehilangan->status !== $this->statusKehilangan) {
                $kehilangan->update(['status' => $this->statusKehilangan]);
            }
        }
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Tanggapan Kehilangan Berhasil Diperbarui')
            ->body('Tanggapan Kehilangan berhasil diperbarui.');
    }

    protected function getRedirectUrl(): string
    {
        return TanggapanKehilanganResource::getUrl('index');
    }
}
