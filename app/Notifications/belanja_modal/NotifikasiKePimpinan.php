<?php

namespace App\Notifications\belanja_modal;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifikasiKePimpinan extends Notification
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
            ->subject('Persetujuan Perencanaan Belanja Modal')
            ->line('Ada pengajuan perencanaan belanja modal yang memerlukan persetujuan.')
            ->action('Lihat Detail', url('dashboard-pimpinan/perencanaan-belanja-modal/' . $this->barmol->id))
            ->line('Terima kasih telah menggunakan aplikasi kami!');
    }
}
