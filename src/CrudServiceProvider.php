<?php

namespace Vip\Crud;

use Illuminate\Support\ServiceProvider;


class CrudServiceProvider extends ServiceProvider 
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
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
        $this->publishes([
            __DIR__.'/Http/Controllers/CrudController.php' => app_path('Http/Controllers/CrudController.php'),
        ]);
        $this->publishes([
            __DIR__.'/routes/web.php' => base_path('routes/web.php'),
        ]);
    }

    public function register() 
    {
        //
    }

}