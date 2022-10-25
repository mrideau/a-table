<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Créer une nouvelle instance de l'email.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Construit l'email.
     */
    public function build()
    {
        return $this->view('emails.contact')->subject($this->data['subject'])->with('data', $this->data);
    }
}
