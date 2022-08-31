<?php

namespace App\Http\Livewire\Groups;

use App\Models\Group;
use Livewire\Component;

class Create extends Component
{
    public Group $group;

    protected array $rules = [
        'group.name' => ['required', 'string', 'min:3', 'max:30', 'unique:groups,name'],
    ];

    public function mount()
    {
        $this->group = new Group();
    }

    public function render()
    {
        return view('livewire.groups.create');
    }

    public function save()
    {
        $this->validate();

        $this->group->user_id = auth()->id();
        $this->group->save();
        $this->emitTo(Index::class, 'group::refresh-list');
    }
}
