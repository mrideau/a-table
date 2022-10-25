<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactValidationEmail extends Mailable
{
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
        return $this->view('emails.contact-validation')->from('ridemap@matis-dev.fr', 'RideMap')->subject('Confirmation de la réception de ton message !')->with('data', $this->data);
    }
}
