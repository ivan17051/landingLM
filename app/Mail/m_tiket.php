<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class m_tiket extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($penerima,$tiket,$pesanan)
    {
        $this->penerima = $penerima;
        $this->tiket = $tiket;
        $this->pesanan = $pesanan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $penerima = $this->penerima;
        $tiket = $this->tiket ;
        $pesanan = $this->pesanan ;
        return $this->from(env('MAIL_USERNAME','LEADME FILM'))->subject('TIKET LEADME')->view('mail.tiket',compact('penerima','tiket','pesanan')); 
    }
}

