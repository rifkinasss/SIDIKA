<?php

namespace App\Notifications\belanja_modal;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PengerjaanNotifikasiKePimpinan extends Notification
{
    protected $barmol;

    public function __construct($barmol)
    {
        $this->barmol = $barmol;
    }

    public function via($notifiable)
    {
        return ['mail']; // Misalkan kita mengirim notifikasi via email
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Persetujuan Pengerjaan Belanja Modal')
            ->line('Ada pengajuan pengerjaan belanja modal yang memerlukan persetujuan.')
            ->action('Lihat Detail', url('dashboard-pimpinan/pengerjaan-belanja-modal/' . $this->barmol->id))
            ->line('Terima kasih telah menggunakan Sistem Informasi Dinas Pendidikan!');
    }
}
