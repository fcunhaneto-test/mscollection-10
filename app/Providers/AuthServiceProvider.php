<?php

namespace App\Providers;

use App\Models\Movie;
use App\Policies\MoviePolicy;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Movie::class => MoviePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // define a admin user role
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });

        //define a author user role
        Gate::define('isAssinante', function($user) {
            return $user->role == 'assinante';
        });
    }
}
