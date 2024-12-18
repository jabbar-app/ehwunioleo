<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RequestMail extends Mailable
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
            ->subject('Notifikasi Request')
            ->view('ehwunioleo.mail.index')
            ->with(
                [
                    'title' => 'Request Pengangkutan LB3 menuju TPS LB3',
                    'description' => 'request pengangkutan Limbah B3 menuju TPS LB3',
                ]
            );
    }
}
