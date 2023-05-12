<?php

namespace AdminKit\Porto\Abstracts;

use AdminKit\Porto\Loaders\MiddlewaresLoaderTrait;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

abstract class MiddlewareServiceProvider extends LaravelServiceProvider
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
