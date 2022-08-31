<?php

use App\Http\Livewire\Groups\Create;
use App\Models\Group;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Livewire\livewire;

it('should be able to create a new group', function () {
    $user = User::factory()->create();

    /** @var User $user */
    actingAs($user);

    livewire(Create::class)
        ->set('name', 'Test Group')
        ->call('save')
        ->assertHasNoErrors();
    
    assertDatabaseCount(Group::class, 1); // ou passo o nome da tabela diretamente 'groups'    
});

