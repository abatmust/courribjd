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
        Gate::define('is_admin', function($user){
            return in_array('admin',$user->roles()->pluck('role')->toArray());
        });
        Gate::define('is_chef', function($user){
            return in_array('chef',$user->roles()->pluck('role')->toArray());
        });
        Gate::define('is_os', function($user){
            return in_array('os',$user->roles()->pluck('role')->toArray());
        });
    }
}
