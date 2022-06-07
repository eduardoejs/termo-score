<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QualquerEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Qualquer email sem markdown';

    public function __construct()
    {
        //
    }
    
    public function build()
    {
        return $this->view('mail.qualquer-email');
    }
}
