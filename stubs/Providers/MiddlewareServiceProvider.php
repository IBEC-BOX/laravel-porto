<?php

namespace App\Ship\Abstracts\Providers;

use AdminKit\Porto\Loaders\MiddlewaresLoaderTrait;
use Illuminate\Contracts\Container\BindingResolutionException;

abstract class MiddlewareServiceProvider extends MainMainServiceProvider
{
    use MiddlewaresLoaderTrait;

    protected array $middlewares = [];

    protected array $middlewareGroups = [];

    protected array $middlewarePriority = [];

    protected array $routeMiddleware = [];

    /**
     * Perform post-registration booting of services.
     *
     * @throws BindingResolutionException
     */
    public function boot(): void
    {
        $this->loadMiddlewares();
    }

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
    }
}
