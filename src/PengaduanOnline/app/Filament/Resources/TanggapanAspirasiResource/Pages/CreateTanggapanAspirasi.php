<?php

namespace App\Filament\Resources\TanggapanAspirasiResource\Pages;

use App\Filament\Resources\TanggapanAspirasiResource;
use App\Models\Aspirasi;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateTanggapanAspirasi extends CreateRecord
{
    protected static string $resource = TanggapanAspirasiResource::class;

    public $id_aspirasi;

    public function mount(): void
    {
        parent::mount();

        $id_aspirasi = request()->query('id_aspirasi');

        //Debug untuk memastika parameter sampai
        Logger('URL Parameter Received:', [
            'id_aspirasi' => $id_aspirasi,
            'full_url' => request()->fullUrl()
        ]);

        if ($id_aspirasi) {
            $aspirasi = Aspirasi::with('user')->find($id_aspirasi);

            if ($id_aspirasi) {
                //Pre-fill form dengan data dari aspirasi
                $this->form->fill([
                    'judul_aspirasi' =>$aspirasi->judul,
                    'nama_pelapor' => $aspirasi->user->name ?? '',
                    'isi_aspirasi' => $aspirasi->isi,
                    'id_aspirasi' => $aspirasi->id,
                    'user_id' => Auth::id(),
                ]);
            }
        }
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Backup jika hidden fields tidak bekerja
        if (empty($data['id_aspirasi'])) {
            $data['id_aspirasi'] = request()->query('id_aspirasi');
        }

        return $data;
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Tanggapan Aspirasi Berhasil Dibuat')
            ->body('Tanggapan aspirasi telah berhasil dibuat.');
    }

    protected function getRedirectUrl(): string
    {
        return TanggapanAspirasiResource::getUrl('index');
    }
}
