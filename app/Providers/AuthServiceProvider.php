<?php

namespace App\Providers;

use App\Models\Group;
use App\Policies\GroupPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Group::class => GroupPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', fn ($user) => $user->admin);
    }
}
