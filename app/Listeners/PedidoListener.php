<?php

namespace App\Listeners;

use App\Events\PedidoUpdatedEvent;
use App\Mail\EmailPedidoMail;
use Illuminate\Support\Facades\Mail;

class PedidoListener
{
    public function __construct()
    {
        //
    }

    // Regra de negócio fica dentro do Listener e não no Evento
    public function handle(PedidoUpdatedEvent $event)
    {
        if ($event->pedido->wasChanged('estado')) {
            logger(' agora eu faço algo já que o estado do pedido mudou ' . __METHOD__);

            Mail::to('jeremias@mail.com')->send(new EmailPedidoMail());
        }
    }
}
