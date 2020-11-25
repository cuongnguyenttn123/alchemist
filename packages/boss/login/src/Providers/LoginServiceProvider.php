<?php
namespace Boss\Login\Providers;

use Illuminate\Support\ServiceProvider;

class LoginServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->loadViewsFrom(__DIR__.'/../views', "login");
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register controller
        $this->app->make("Boss\Login\Controllers\Login");
        /**
         * res: Publish assets file to public folder
         * cmd: php artisan vendor:publish --tag=public --force
         */
        $this->publishes([__DIR__.'/assets'=>public_path('boss/login/assets')],'public');
    }
}
