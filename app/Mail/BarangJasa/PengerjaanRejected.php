<?php

namespace App\Mail\BarangJasa;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PengerjaanRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $barjas;

    public function __construct($barjas)
    {
        $this->barjas = $barjas;
    }

    public function build()
    {
        return $this->view('emails.barang-jasa.pengerjaan-rejected')
            ->subject('Perencanaan Belanja Barang Jasa Ditolak')
            ->with(['barjas' => $this->barjas]);
    }
}
