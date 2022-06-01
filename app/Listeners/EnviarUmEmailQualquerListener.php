<?php

namespace App\Listeners;

use App\Events\ChegueiA10Pessoas;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarUmEmailQualquerListener implements ShouldQueue
{
    use Queueable;

    /**
     * Um Listener ouve um determinado evento
     * e toma uma ação para aquele evento ocorrido
     */

    public function __construct()
    {
    }

    /**
     * Método handle(): recebe como parâmetro o evento ao qual
     * esse listener está relacionado.
     * Nesse exemplo, como este listener está amarrado com o
     * evento ChegueiA10Pessoas posso tipar o tipo do parâmetro
     */
    public function handle(ChegueiA10Pessoas $event)
    {
        sleep(1);
        logger('enviei um email :: ' . __CLASS__);
    }
}
