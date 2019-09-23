<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // SuperAdmin only
        Gate::define('isSuperAdmin', function ($user)
        {
            // return $user->role == 'superAdmin';
            if ($user->role == superAdmin)
            {
                return $user->role(superAdmin);
            }
            return $user->role(user);
        });
    }
}
