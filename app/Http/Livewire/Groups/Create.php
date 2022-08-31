<?php

namespace App\Http\Livewire\Groups;

use App\Models\Group;
use Livewire\Component;

class Create extends Component
{
    public string $name = '';

    public function render()
    {
        return view('livewire.groups.create');
    }

    public function save()
    {
        Group::query()->create(['user_id' => auth()->id(), 'name' =>  $this->name]);
    }
}
