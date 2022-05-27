<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public ?string $email    = null;
    public ?string $password = null;

    protected $rules = [
        'email'    => 'required|email',
        'password' => 'required'
    ];

    public function render(): Factory|View|Application
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $this->validate();

        $credentials = [
            'email'    => $this->email,
            'password' => $this->password
        ];
                        
        if (Auth::attempt($credentials)) {
            return $this->redirect('/');
        }

        return $this->redirect(route('login'));
    }
}
