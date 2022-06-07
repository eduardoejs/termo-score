<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QualquerEmailMarkdown extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Qualquer email com Markdown';
    
    public function __construct(public User $user)
    {
        //
    }

    public function build()
    {
        return $this->markdown('mail.qualquer-email-markdown', [
            'user' => $this->user
        ]);
    }
}
