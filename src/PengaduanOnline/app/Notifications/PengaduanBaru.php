<?php

namespace App\Notifications;

use App\Models\Pengaduan;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PengaduanBaru extends Notification
{
    public function __construct(public Pengaduan $pengaduan) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Pengaduan Baru Masuk')
            ->greeting('Halo Admin!')
            ->line('Ada pengaduan baru dari: ' . $this->pengaduan->user->name)
            ->line('Judul: ' . $this->pengaduan->judul)
            ->line('Isi Pengaduan: ' . $this->pengaduan->isi_pengaduan)
            ->action('Lihat Pengaduan', url('/admin/pengaduans'));
    }
}
