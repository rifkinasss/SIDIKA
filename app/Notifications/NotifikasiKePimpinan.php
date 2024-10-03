<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NotifikasiKePimpinan extends Notification
{
    protected $perjalanandinas;

    public function __construct($perjalanandinas)
    {
        $this->perjalanandinas = $perjalanandinas;
    }

    public function via($notifiable)
    {
        return ['mail']; // Misalkan kita mengirim notifikasi via email
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Notifikasi Perjalanan Dinas')
            ->line('Ada pengajuan perjalanan dinas yang memerlukan persetujuan.')
            ->action('Lihat Detail', url('dashboard-pimpinan/pengajuan-perjalanan-dinas/' . $this->perjalanandinas->id))
            ->line('Terima kasih telah menggunakan Sistem Informasi Dinas Pendidikan!');
    }
}
