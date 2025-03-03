<?php

namespace App\Mail\BarangJasa;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PengerjaanApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $barjas;

    public function __construct($barjas)
    {
        $this->barjas = $barjas;
    }

    public function build()
    {
        return $this->view('emails.barang-jasa.pelaporan-approved')
            ->subject('Pelaporan Belanja Barang Jasa Disetujui')
            ->with(['barjas' => $this->barjas]);
    }
}
