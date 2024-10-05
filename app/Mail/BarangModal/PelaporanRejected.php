<?php

namespace App\Mail\BarangModal;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PelaporanRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $barmod;

    public function __construct($barmod)
    {
        $this->barmod = $barmod;
    }

    public function build()
    {
        return $this->view('emails.belanja-modal.pelaporan-rejected')
            ->subject('Pelaporan Belanja Modal Ditolak')
            ->with(['barmod' => $this->barmod]);
    }
}
