<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ScheduleMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    public function build()
    {
        return $this->from('admin@ehwunioleo.com', 'EHW Unioleo')
            ->subject('Notifikasi Schedule')
            ->view('ehwunioleo.mail.index')
            ->with(
                [
                    'title' => 'Request Pengangkutan dari TPS LB3 menuju 3<sup>rd</sup> Party',
                    'description' => 'request pengangkutan Limbah  dari TPS LB3 menuju Tujuan Akhir 3P',
                ]
            );
    }
}
