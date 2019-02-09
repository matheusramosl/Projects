<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerAssistanceGates();

        //
    }
    public function registerAssistanceGates()
    {
        //Assistance Report Gates
        Gate::define( 'access-professor-resource', function($user) {
            if ($user->isDiretor() || $user->isSecretario() || $user->isAdmin() || $user->isProfessor()) {
                return true;
            }

            return false;
        });

        Gate::define( 'access-student-resource', function($user) {
            if ($user->isDiretor() || $user->isSecretario() || $user->isAdmin()) {
                return true;
            }

            return false;
        });
        Gate::define( 'access-curso-resource', function($user) {
            if ($user->isDiretor() || $user->isSecretario() || $user->isAdmin()) {
                return true;
            }

            return false;
        });
        Gate::define( 'access-sala-resource', function($user) {
            if ($user->isDiretor() || $user->isSecretario() || $user->isAdmin()) {
                return true;
            }

            return false;
        });
        Gate::define( 'access-grid-resource', function($user) {
            if ($user->isDiretor() || $user->isSecretario() || $user->isAdmin()) {
                return true;
            }

            return false;
        });
        Gate::define( 'access-dashboard', function($user) {
            if ($user->isDiretor() || $user->isAdmin()) {
                return true;
            }

            return false;
        });
        Gate::define( 'access-user-resource', function($user) {
            if ($user->isDiretor() || $user->isAdmin()) {
                return true;
            }

            return false;
        });
        Gate::define( 'access-finaces-resource', function($user) {
            if ($user->isDiretor() || $user->isAdmin()) {
                return true;
            }

            return false;
        });
    }
}
