<?php

namespace App\Filament\Resources\TanggapanAspirasiResource\Pages;

use App\Filament\Resources\TanggapanAspirasiResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditTanggapanAspirasi extends EditRecord
{
    protected static string $resource = TanggapanAspirasiResource::class;

    public function mount(int|string $record): void
    {
        parent::mount($record);

        // load data aspirasi yang terkait
        $tanggapan = $this->getRecord();
        if ($tanggapan && $tanggapan->aspirasi) {
            $aspirasi = $tanggapan->aspirasi()->with('user')->first();

            if ($aspirasi) {
                // Pre-fill form dengan data aspirasi
                $this->form->fill([
                    'judul_aspirasi' => $aspirasi->judul,
                    'nama_pelapor' => $aspirasi->user->name ?? '',
                    'isi_aspirasi' => $aspirasi->isi,
                    'tanggapan' => $tanggapan->tanggapan,
                    'id_aspirasi' => $aspirasi->id,
                    'user_id' => $tanggapan->user_id,
                ]);
            }
        }
    }

    protected function getRedirectUrl(): string
    {
        return TanggapanAspirasiResource::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Tanggapan Aspirasi Berhasil Diperbarui')
            ->body('Tanggapan aspirasi telah berhasil diperbarui.')
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
