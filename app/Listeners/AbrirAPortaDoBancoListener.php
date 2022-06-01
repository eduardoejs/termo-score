<?php

namespace App\Listeners;

use App\Events\ChegueiA10Pessoas;

class AbrirAPortaDoBancoListener
{
    public function __construct()
    {
        //
    }

    public function handle(ChegueiA10Pessoas $event)
    {
        sleep(1);
        logger('abrindo a porta do banco :: ' . __CLASS__);
    }
}
