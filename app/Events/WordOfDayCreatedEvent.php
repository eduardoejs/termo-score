<?php

namespace App\Events;

use App\Models\WordOfDay;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WordOfDayCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public WordOfDay $wordOfDay
    ) {
        //
    }
}
