<?php

namespace App\Console\Commands;

use App\Events\ChegueiA10Pessoas;
use Illuminate\Console\Command;

class Playground extends Command
{
    protected $signature = 'play';

    protected $description = 'Command description';

    public function handle()
    {
        // método event realiza o dispatch do(s)
        // evento(s) passados como parêmetro
        event(new ChegueiA10Pessoas());

        return 0;
    }
}
