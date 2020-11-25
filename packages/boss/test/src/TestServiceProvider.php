<?php

namespace Boss\Test;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__. '/views', "view");
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make("Boss\Test\Controllers\TestController");
        $this->publishes([__DIR__.'/assets'=>public_path('boss/assets')], 'public'); //php artisan vendor:publish --tag=public --force


    }
}
