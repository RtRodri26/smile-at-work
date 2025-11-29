<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CitaAgendada extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $data) {}

    public function build()
    {
        return $this->subject('Confirmación de cita agendada con Smile At Work.')
                    ->view('emails.cita-agendada')
                    ->with('data', $this->data);
    }
}
