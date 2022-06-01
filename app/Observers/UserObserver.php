<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    // public function created(User $user)
    // {
    //     //
    // }

    // public function updated(User $user)
    // {
    //     //
    // }

    public function deleted(User $user)
    {
        logger("usuário excluído :: $user->name :: " . __METHOD__);
    }

    // public function restored(User $user)
    // {
    //     //
    // }

    // public function forceDeleted(User $user)
    // {
    //     //
    // }
}
