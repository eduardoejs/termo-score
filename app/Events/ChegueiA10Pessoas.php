<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChegueiA10Pessoas
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        logger(__CLASS__);
    }
}
