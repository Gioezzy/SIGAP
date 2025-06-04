<?php

namespace App\Filament\Resources\TanggapanKritikSaranResource\Pages;

use App\Filament\Resources\TanggapanKritikSaranResource;
use App\Models\KritikSaran;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateTanggapanKritikSaran extends CreateRecord
{
    protected static string $resource = TanggapanKritikSaranResource::class;

    public $id_kritiksaran;

    public function mount(): void
    {
        parent::mount();

        $id_kritiksaran = request()->query('id_kritiksaran');

        // Debug untuk memastikan parameter sampai
        logger('URL Parameter received:', [
            'id_kritiksaran' => $id_kritiksaran,
            'full_url' => request()->fullUrl()
        ]);

        if ($id_kritiksaran) {
            $kritiksaran = KritikSaran::with('user')->find($id_kritiksaran);

            if ($id_kritiksaran) {
                // Pre-fill form dengan data dari kritik saran
                $this->form->fill([
                    'judul_kritiksaran' => $kritiksaran->judul,
                    'nama_pelapor' => $kritiksaran->user->name ?? '',
                    'isi_kritiksaran' => $kritiksaran->isi,
                    'id_kritiksaran' => $kritiksaran->id,
                    'user_id' => Auth::id(),
                ]);
            }
        }
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Backup jika hidden fields tidak bekerja
        if (empty($data['id_kritiksaran'])) {
            $data['id_kritiksaran'] = request()->query('id_kritiksaran');
        }

        return $data;
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Tanggapan Kritik & Saran Berhasil Dibuat')
            ->body('Tanggapan kritik & saran telah berhasil dibuat.');
    }

    protected function getRedirectUrl(): string
    {
        return TanggapanKritikSaranResource::getUrl('index');
    }
}
