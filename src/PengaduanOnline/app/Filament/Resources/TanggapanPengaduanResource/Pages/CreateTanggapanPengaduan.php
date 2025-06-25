<?php

namespace App\Filament\Resources\TanggapanPengaduanResource\Pages;

use App\Filament\Resources\TanggapanPengaduanResource;
use App\Helpers\Whatsapp;
use App\Models\Pengaduan;
use App\Notifications\TanggapanBaru;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateTanggapanPengaduan extends CreateRecord
{
    protected static string $resource = TanggapanPengaduanResource::class;

    public $pengaduan_id;

    public $statusPengaduan;

    public function mount(): void
    {
        parent::mount();

        $pengaduan_id = request()->query('pengaduan_id');
        $kategori_id = request()->query('kategori_id');

        // Debug untuk memastikan parameter sampai
        logger('URL Parameters received:', [
            'pengaduan_id' => $pengaduan_id,
            'kategori_id' => $kategori_id,
            'full_url' => request()->fullUrl(),
        ]);

        if ($pengaduan_id) {
            $pengaduan = Pengaduan::with('user', 'kategori')->find($pengaduan_id);

            if ($pengaduan) {
                // Pre-fill form dengan data pengaduan dan parameter yang diperlukan
                $this->form->fill([
                    'judul_pengaduan' => $pengaduan->judul,
                    'nama_pelapor' => $pengaduan->user->name ?? '',
                    'nohp' => $pengaduan->user->no_hp ?? '',
                    'alamat' => $pengaduan->user->alamat ?? '',
                    'kategori_nama' => $pengaduan->kategori->namaKategori ?? '',
                    'isi_pengaduan' => $pengaduan->isi_pengaduan,
                    'pengaduan_id' => $pengaduan->id,
                    'kategori_id' => $pengaduan->kategori_id,
                    'user_id' => Auth::id(),
                    'status' => 'proses',
                ]);
            }
        }
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['pengaduan_id'])) {
            $data['pengaduan_id'] = request()->query('pengaduan_id');
        }

        if (empty($data['kategori_id'])) {
            $data['kategori_id'] = request()->query('kategori_id');
        }

        if (empty($data['user_id'])) {
            $data['user_id'] = Auth::id();
        }

        $this->statusPengaduan = $data['status'] ?? 'proses';
        unset($data['status']);

        return $data;
    }

    protected function afterCreate(): void
    {
        if ($this->record->pengaduan_id && isset($this->statusPengaduan)) {
            Pengaduan::where('id', $this->record->pengaduan_id)
                ->update(['status' => $this->statusPengaduan]);

            logger('Status pengaduan updated:', [
                'pengaduan_id' => $this->record->pengaduan_id,
                'new_status' => $this->statusPengaduan,
            ]);
        }

        $user = $this->record->pengaduan->user ?? null;

        if ($user && $user->email) {
            $user->notify(new TanggapanBaru($this->record));
            logger('Notifikasi tanggapan dikirim ke: '.$user->email);
        }

        // ✅ Tambahkan ini untuk kirim WhatsApp ke user
        if ($user && $user->no_hp) {
            $message = "🔔 PEMBERITAHUAN TANGGAPAN PENGADUAN\n\n".
                "Yth. Bapak/Ibu,\n\n".
                "Pengaduan Anda telah mendapat tanggapan dari tim kami.\n\n".
                "📋 Detail Pengaduan:\n".
                "• Judul: {$this->record->pengaduan->judul}\n".
                "• Status: Telah Ditanggapi\n\n".
                "💬 Tanggapan:\n".
                "{$this->record->isi_tanggapan}\n\n".
                "🌐 Untuk melihat detail lengkap tanggapan, silakan kunjungi website kami.\n\n".
                "Terima kasih atas kepercayaan Anda.\n\n".
                "Hormat kami,\n".
                'Tim SIGAP';

            Whatsapp::kirim($user->no_hp, $message);
            logger('Notifikasi WA dikirim ke: '.$user->no_hp);
        }
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Tanggapan Pengaduan Dibuat')
            ->body('Tanggapan pengaduan baru telah berhasil dibuat.');
    }

    protected function getRedirectUrl(): string
    {
        return TanggapanPengaduanResource::getUrl('index');
    }
}
