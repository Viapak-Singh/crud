<?php

namespace Vip\Crud;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


class CrudServiceProvider extends ServiceProvider 
{

    public function boot()
    {
        // $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'crud');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->mergeConfigFrom(
            __DIR__.'/config/crud.php', 'crud'
        );
        $this->publishes([
            __DIR__.'/config/crud.php' => config_path('crud.php'),
        ]);
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/crud'),
        ]);
        $this->loadRoutes();
    }

    public function register() 
    {
        //
    }

    private function loadRoutes()
    {
        Route::macro('vipCrud', function () {
            $this->group([
                'namespace' => 'Vip\Crud\Controllers',
                'middleware' => 'web',
            ], function () {
                $this->loadRoutesFrom(__DIR__.'/routes/web.php');
            });
        });
    }

}