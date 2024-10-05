<?php

namespace App\Notifications\barang_jasa;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PerencanaanNotifikasiKePimpinan extends Notification
{
    protected $barjas;

    public function __construct($barjas)
    {
        $this->barjas = $barjas;
    }

    public function via($notifiable)
    {
        return ['mail']; // Misalkan kita mengirim notifikasi via email
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Persetujuan Perencanaan Belanja Barang Jasa')
            ->line('Ada pengajuan perencanaan belanja barang jasa yang memerlukan persetujuan.')
            ->action('Lihat Detail', url('dashboard-pimpinan/perencanaan-belanja-barjas/' . $this->barjas->id))
            ->line('Terima kasih telah menggunakan Sistem Informasi Dinas Pendidikan!');
    }
}
