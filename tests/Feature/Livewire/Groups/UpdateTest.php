<?php

use App\Http\Livewire\Groups\Index;
use App\Http\Livewire\Groups\Update;
use App\Models\Group;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

beforeEach(function() {
    $this->user = User::factory()->createOne();
    $this->group = Group::factory()->createOne(['name' => 'Old Test Group', 'user_id' => $this->user->id]);

    actingAs($this->user);
});

it('should be able to update a group name', function () {

    $group = $this->group;

    livewire(Update::class, compact('group'))
        ->set('group.name', 'New Test Group')
        ->call('save')
        ->assertHasNoErrors()
        ->assertEmittedTo(Index::class, 'group::refresh-list');

    expect($group->refresh())
        ->name->toBe('New Test Group');
});

it('should check if the person that is trying to edit the group owns the group', function () {
    $otherUser = User::factory()->createOne();
    
    $otherGroup = Group::factory()->create(['user_id' => $otherUser->id, 'name' => 'Group One']);

    livewire(Update::class, compact('otherGroup'))
        ->assertForbidden();
});

#region Validations
test('name should be required', function () {    
    
    $group = $this->group;

    livewire(Update::class, compact('group'))
        ->set('group.name', '')
        ->call('save')
        ->assertHasErrors(['group.name' => 'required']);

});

test('name should be a valid string', function () {
    $group = $this->group;

    livewire(Update::class, compact('group'))
        ->set('group.name', 1)
        ->call('save')
        ->assertHasErrors(['group.name' => 'string']);
});

test('name should have a min of 3 characters', function () {
    $group = $this->group;

    livewire(Update::class, compact('group'))
        ->set('group.name', 'a')
        ->call('save')
        ->assertHasErrors(['group.name' => 'min']);
});

test('name should have a max of 30 characters', function () {
    $group = $this->group;

    livewire(Update::class, compact('group'))
        ->set('group.name', str_repeat('a', 31))
        ->call('save')
        ->assertHasErrors(['group.name' => 'max']);
});

test('name should be unique', function () {
    Group::factory()->create(['name' => 'Test Group', 'user_id' => $this->user->id]);

    $group = $this->group;

    livewire(Update::class, compact('group'))
        ->set('group.name', 'Test Group')
        ->call('save')
        ->assertHasErrors(['group.name' => 'unique']);
});

#endregion

