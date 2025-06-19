<?php

namespace App\Filament\Resources\TanggapanKeramaianResource\Pages;

use App\Filament\Resources\TanggapanKeramaianResource;
use App\Models\Keramaian;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditTanggapanKeramaian extends EditRecord
{
    protected static string $resource = TanggapanKeramaianResource::class;

    public $statusKeramaian;

    /**
     * Mount the page with the given record.
     *
     * @param int|string $record
     */

    public function mount(int | string $record): void
    {
        parent::mount($record);
        //load data keramaian yg terkait
        $tanggapan = $this->getRecord();

        if($tanggapan && $tanggapan->keramaian){
            $keramaian = $tanggapan->keramaian()->with('user')->first();

            if($keramaian){
                // isi form dengan data keramaian yg terkait
                $this->form->fill([
                    'nama_pelapor' => $keramaian->user->name ?? '',
                    'nama_acara' => $keramaian->nama_acara,
                    'lokasi_acara' => $keramaian->lokasi_acara,
                    'tanggal_acara' => $keramaian->tanggal_acara,
                    'waktu_acara' => $keramaian->waktu_acara,
                    'status' => $keramaian->status,
                    'id_keramaian' => $keramaian->id,
                    'user_id' => Auth::id()
                ]);
            }
        }
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // simpan status yg akan diupdate ke tabel keramaian
        $this->statusKeramaian = $data['status'] ?? null;

        //hapus status dari data karena tidak ada di tabel tanggapan
        unset($data['status']);

        return $data;
    }

    protected function afterSave(): void
    {
        // update status di tabel keramanaian
        if($this->record->id_keramaian && isset($this->statusKeramaian)){
            $keramaian = Keramaian::find($this->record->id_keramaian);

            if ($keramaian && $keramaian->status !== $this->statusKeramaian){
                $keramaian->update(['status' => $this->statusKeramaian]);
            }
        }
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Tanggapan Keramaian Berhasil Diperbarui')
            ->body('Tanggapan Keramaian Berhasil Diperbarui');
    }

    protected function getRedirectUrl(): string
    {
        return TanggapanKeramaianResource::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
