<?php

namespace AdminKit\Porto;

use AdminKit\Porto\Generator\GeneratorsServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PortoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('porto')
            ->hasConfigFile();
    }

    public function bootingPackage(): void
    {
    }

    public function registeringPackage(): void
    {
        $this->app->register(GeneratorsServiceProvider::class);
    }
}
