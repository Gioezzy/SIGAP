<?php

namespace App\Notifications;

use App\Models\TanggapanPengaduan;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TanggapanBaru extends Notification
{
    use Queueable;

    public function __construct(public TanggapanPengaduan $tanggapan)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Tanggapan Pengaduan Anda')
            ->greeting('Halo ' . $this->tanggapan->pengaduan->user->name . ',')
            ->line('Pengaduan Anda berjudul:')
            ->line('"' . $this->tanggapan->pengaduan->judul . '" telah ditanggapi oleh admin.')
            ->line('Isi Tanggapan:')
            ->line(strip_tags($this->tanggapan->isi_tanggapan))
            ->action('Lihat Pengaduan', url('/tanggapanpengaduan'))
            ->line('Terima kasih telah menggunakan layanan pengaduan online.');
    }
}
