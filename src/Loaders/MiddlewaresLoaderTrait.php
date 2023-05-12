<?php

namespace AdminKit\Porto\Loaders;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Http\Kernel;

trait MiddlewaresLoaderTrait
{
    /**
     * @void
     *
     * @throws BindingResolutionException
     */
    public function loadMiddlewares(): void
    {
        $this->registerMiddleware($this->middlewares);
        $this->registerMiddlewareGroups($this->middlewareGroups);
        $this->registerMiddlewarePriority($this->middlewarePriority);
        $this->registerRouteMiddleware($this->routeMiddleware);
    }

    /**
     * Registering Route Group's
     *
     * @throws BindingResolutionException
     */
    private function registerMiddleware(array $middlewares = []): void
    {
        $httpKernel = $this->app->make(Kernel::class);

        foreach ($middlewares as $middleware) {
            $httpKernel->prependMiddleware($middleware);
        }
    }

    /**
     * Registering Route Group's
     */
    private function registerMiddlewareGroups(array $middlewareGroups = []): void
    {
        foreach ($middlewareGroups as $key => $middleware) {
            if (! is_array($middleware)) {
                $this->app['router']->pushMiddlewareToGroup($key, $middleware);
            } else {
                foreach ($middleware as $item) {
                    $this->app['router']->pushMiddlewareToGroup($key, $item);
                }
            }
        }
    }

    /**
     * Registering Route Middleware's priority
     */
    private function registerMiddlewarePriority(array $middlewarePriority = []): void
    {
        foreach ($middlewarePriority as $key => $middleware) {
            if (! in_array($middleware, $this->app['router']->middlewarePriority)) {
                $this->app['router']->middlewarePriority[] = $middleware;
            }
        }
    }

    /**
     * Registering Route Middleware's
     */
    private function registerRouteMiddleware(array $routeMiddleware = []): void
    {
        foreach ($routeMiddleware as $key => $value) {
            $this->app['router']->aliasMiddleware($key, $value);
        }
    }
}
