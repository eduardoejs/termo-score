<?php

namespace App\Console\Commands;

use App\Mail\QualquerEmail;
use App\Mail\QualquerEmailMarkdown;
use App\Models\User;
use App\Notifications\QualquerNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class Playground extends Command
{
    protected $signature = 'play';

    protected $description = 'Playground description';

    public function handle()
    {
        $user = User::first();

        // Mail::to($user)
        //     ->cc('copia@nao-oculta.com')
        //     ->bcc('copia@oculta.com')
        //     ->send(new QualquerEmail());

        // Mail::to($user)
        //     ->send(new QualquerEmailMarkdown($user));

        // run command php artisan notifications:table and run migrations
        $approver = User::first();
        $order    = 'BRJ070622-A';
        $approver->notify(new QualquerNotification($order));

        Notification::send([$approver, $approver], new QualquerNotification());
    }
}
