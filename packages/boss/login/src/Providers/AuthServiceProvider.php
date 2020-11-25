<?php

namespace Boss\Login\Providers;

use Boss\Login\Models\Permission;
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
        \Boss\Login\Models\User::class => \Boss\Login\Policies\UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * use:
         * - in view: @can('example') @endcan // @cannot
         * - in middleware: middleware(['can::example']) //cannot
         * - in controller: $this->authorize('example')
         */
        Gate::define('example', function($user){

            return true;
        });
        if(! $this->app->runningInConsole()){
            foreach(Permission::all() as $per){
                Gate::define($per->slug, function($user) use ($per){
                   return $user->hasPermission($per);
                });
            }
        }
    }
}
