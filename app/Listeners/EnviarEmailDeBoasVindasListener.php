<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;

class EnviarEmailDeBoasVindasListener
{
    public function __construct()
    {
        //
    }

    public function handle(Registered $event)
    {
        logger('enviando email de boas vindas :: ' . __CLASS__);
    }
}
