<?php

use App\Http\Livewire\Auth\Login;

use App\Models\User;
use function Pest\Livewire\livewire;

it('should be able to login', function () {
    $user = User::factory()->createOne(['email' => 'edu@mail.com']);

    livewire(Login::class)
        ->set('email', 'edu@mail.com')
        ->set('password', 'password')
        ->call('login')
        ->assertStatus(200)
        ->assertRedirect(route('welcome'));

    expect(auth())
        ->check()->toBeTrue()
        ->user()->id->toBe($user->id);
});
