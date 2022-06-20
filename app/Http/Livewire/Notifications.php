<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notifications extends Component
{
    public function render()
    {
        $notifications = auth()->user()->unreadNotifications()->get();
        // $notifications->each->markAsRead();

        return view('livewire.notifications', compact('notifications'));
    }
}
