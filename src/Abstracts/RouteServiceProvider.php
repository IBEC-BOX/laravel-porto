<?php

namespace AdminKit\Porto\Abstracts;

use AdminKit\Porto\Loaders\RoutesLoaderTrait;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as LaravelRouteServiceProvider;

abstract class RouteServiceProvider extends LaravelRouteServiceProvider
{
    use RoutesLoaderTrait;

    protected string $containerPath;

    public function __construct($app)
    {
        $this->containerPath = realpath(dirname((new \ReflectionClass($this))->getFileName()) . '/..');
        parent::__construct($app);
    }

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        //        $this->routes(function () {
        //            Route::middleware('api')
        //                ->prefix('api')
        //                ->group(base_path('routes/api.php'));
        //
        //            Route::middleware('web')
        //                ->group(base_path('routes/web.php'));
        //        });
    }

    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->runRoutesAutoLoader();
    }
}
