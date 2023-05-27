<?php

namespace Vip\Crud;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

/**
 * Class CrudRouteServiceProvider
 *
 * @package Vip\Crud
 *
 * @author Viapak Singh <vip8work@gmail.com>
 */
class CrudRouteServiceProvider extends RouteServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     * In addition, it is set as the URL generator's root namespace.
     * @var string
     */
    protected $namespace = 'Vip\Crud\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     * These routes all receive session state, CSRF protection, etc.
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group($this->getRoutesFile());
    }

    /**
     * Get routes file.
     * @return mixed
     */
    private function getRoutesFile()
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'routes.php';
    }
}