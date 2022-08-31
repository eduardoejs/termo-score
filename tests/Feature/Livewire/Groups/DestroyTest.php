<?php

use App\Models\User;
use App\Models\Group;
use App\Http\Livewire\Groups\Index;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;
use App\Http\Livewire\Groups\Destroy;
use function Pest\Laravel\assertDatabaseCount;

beforeEach(function() {
    $this->user = User::factory()->createOne();
    actingAs($this->user);
});

it('should be able to delete a group', function () {
    $group = Group::factory()->createOne(['user_id' => $this->user->id]);

    livewire(Destroy::class, compact('group'))
        ->call('destroy')
        ->assertEmittedTo(Index::class, 'group::refresh-list');
        
    assertDatabaseCount(Group::class, 0);
});

it('should check if the person that is trying to delete the group owns the group', function () {
    $otherUser = User::factory()->createOne();
    
    $otherGroup = Group::factory()->create(['user_id' => $otherUser->id, 'name' => 'Group One']);

    livewire(Destroy::class, compact('otherGroup'))
        ->assertForbidden();
});

