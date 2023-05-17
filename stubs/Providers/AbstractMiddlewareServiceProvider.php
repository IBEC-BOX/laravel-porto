<?php

namespace App\Ship\Abstracts\Providers;

use AdminKit\Porto\Abstracts\MiddlewareServiceProvider;

abstract class AbstractMiddlewareServiceProvider extends MiddlewareServiceProvider
{
    protected array $middlewares = [];

    protected array $middlewareGroups = [];

    protected array $middlewarePriority = [];

    protected array $routeMiddleware = [];
}
