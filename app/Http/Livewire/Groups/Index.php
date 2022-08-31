<?php

namespace App\Http\Livewire\Groups;

use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'group::refresh-list' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.groups.index');
    }

    public function getGroupsProperty()
    {
        return auth()->user()->groups;
    }
}
