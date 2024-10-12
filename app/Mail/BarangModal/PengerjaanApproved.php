<?php

namespace App\Mail\BarangModal;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PengerjaanApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $barmod;

    public function __construct($barmod)
    {
        $this->barmod = $barmod;
    }

    public function build()
    {
        return $this->view('emails.belanja-modal.pengerjaan-approved')
            ->subject('Pengerjaan Belanja Modal Disetujui')
            ->with(['barmod' => $this->barmod]);
    }
}