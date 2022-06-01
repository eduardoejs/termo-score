<?php

namespace App\Listeners;

use App\Events\UserSavedEvent;

class SoltarUmLikeListener
{
    public function __construct()
    {
        //
    }

    public function handle(UserSavedEvent $event)
    {
        sleep(1);
        logger('soltei um like :: User: ' . $event->user->name . ' :: ' . __CLASS__);
    }
}
