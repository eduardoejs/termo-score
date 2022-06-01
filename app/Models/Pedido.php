<?php

namespace App\Models;

use App\Events\PedidoUpdatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    // Não usei o Observer para disparar o evento,
    protected $dispatchesEvents = [
        'updated' => PedidoUpdatedEvent::class,
    ];
}
