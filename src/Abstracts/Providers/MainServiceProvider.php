<?php

namespace AdminKit\Porto\Abstracts\Providers;

use AdminKit\Porto\Loaders\AliasesLoaderTrait;
use AdminKit\Porto\Loaders\ProvidersLoaderTrait;
use Illuminate\Support\ServiceProvider as LaravelAppServiceProvider;

abstract class MainServiceProvider extends LaravelAppServiceProvider
{
    use ProvidersLoaderTrait;
    use AliasesLoaderTrait;

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->loadServiceProviders();
        $this->loadAliases();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
