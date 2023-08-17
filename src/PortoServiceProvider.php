<?php

namespace AdminKit\Porto;

use AdminKit\Porto\Commands\ApiControllerGenerator;
use AdminKit\Porto\Commands\ApiResourceGenerator;
use AdminKit\Porto\Commands\ApiRoutesGenerator;
use AdminKit\Porto\Commands\ProviderGenerator;
use AdminKit\Porto\Commands\ModelGenerator;
use AdminKit\Porto\Generator\GeneratorsServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PortoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('porto')
            ->hasCommands([
                ModelGenerator::class,
                ApiControllerGenerator::class,
                ApiRoutesGenerator::class,
                ApiResourceGenerator::class,
                ProviderGenerator::class,
            ])
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
