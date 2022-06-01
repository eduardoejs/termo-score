<?php

use App\Events\PedidoUpdatedEvent;
use App\Mail\EmailPedidoMail;
use App\Models\Pedido;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

test('um evento precisa ser disparado quando atualizar o pedido :: testando o disparo do evento', function () {
    Event::fake();

    $pedido = Pedido::query()->create(['estado' => 'show']);

    Event::assertNotDispatched(PedidoUpdatedEvent::class);

    $pedido->estado = 'outro estado';
    $pedido->save();

    Event::assertDispatched(PedidoUpdatedEvent::class);
});

test('um email precisa ser enviado se o estado do pedido for atualizado :: testando o envio do email disparado pelo listener do evento', function () {
    Mail::fake();

    $pedido = Pedido::query()->create(['estado' => 'recebido']);

    Mail::assertNothingSent();
    $pedido->estado = 'recebido';
    $pedido->save();
    Mail::assertNothingSent();
    
    $pedido->estado = 'processando';
    $pedido->save();

    Mail::assertSent(EmailPedidoMail::class);
});
