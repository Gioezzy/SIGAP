<?php

namespace App\Filament\Resources\TanggapanKritikSaranResource\Pages;

use App\Filament\Resources\TanggapanKritikSaranResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditTanggapanKritikSaran extends EditRecord
{
    protected static string $resource = TanggapanKritikSaranResource::class;

    public function mount(int|string $record): void
    {
        parent::mount($record);

        // load data kritik saran yang terkait
        $tanggapan = $this->getRecord();
        if ($tanggapan && $tanggapan->kritiksaran) {
            $kritiksaran = $tanggapan->kritiksaran()->with('user')->first();

            if ($kritiksaran) {
                // Pre-fill form dengan data kritik saran
                $this->form->fill([
                    'judul_kritiksaran' => $kritiksaran->judul,
                    'nama_pelapor' => $kritiksaran->user->name ?? '',
                    'isi_kritiksaran' => $kritiksaran->isi,
                    'tanggapan' => $tanggapan->tanggapan,
                    'id_kritiksaran' => $kritiksaran->id,
                    'user_id' => $tanggapan->user_id,
                ]);
            }
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return TanggapanKritikSaranResource::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Tanggapan Kritik & Saran Berhasil Diperbarui')
            ->body('Tanggapan kritik & saran telah berhasil diperbarui.')
            ->send();
    }
}
