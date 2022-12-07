<?php

namespace App\Providers;

use App\Models\User;
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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //for admin which i using in config/adminglte 
        Gate::define('admin', function($user) {
            return $user->hasRole('is_owner');
        });

        //for customer which i using in config/adminglte
        Gate::define('customer', function($user) {
            if( ! $user->hasRole('is_owner')) {
                return $user;
            }
        });
    }
}
