<?php

namespace App\Mail;

use App\Models\Pendaftar;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class Pemberitahuan extends Mailable
{
    use Queueable, SerializesModels;
    public $pendaftar;
    public $pesan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pendaftar, $pesan)
    {
        $this->pendaftar = $pendaftar;
        $this->pesan = $pesan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')
            ->view('mail');
        // return $this->view('view.name');
    }
}
