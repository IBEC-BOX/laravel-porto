<?php

namespace AdminKit\Porto;

use AdminKit\Porto\Commands\ApiControllerGenerator;
use AdminKit\Porto\Commands\ApiRequestGenerator;
use AdminKit\Porto\Commands\ApiResourceGenerator;
use AdminKit\Porto\Commands\ApiRoutesGenerator;
use AdminKit\Porto\Commands\ContainerGenerator;
use AdminKit\Porto\Commands\FactoryGenerator;
use AdminKit\Porto\Commands\FilamentResourceGenerator;
use AdminKit\Porto\Commands\MigrationGenerator;
use AdminKit\Porto\Commands\ModelGenerator;
use AdminKit\Porto\Commands\ProviderGenerator;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PortoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('porto')
            ->hasCommands([
                ProviderGenerator::class,
                MigrationGenerator::class,
                ModelGenerator::class,
                FactoryGenerator::class,
                ApiControllerGenerator::class,
                ApiRoutesGenerator::class,
                ApiResourceGenerator::class,
                ApiRequestGenerator::class,
                FilamentResourceGenerator::class,
                ContainerGenerator::class,
            ])
            ->hasConfigFile();
    }

    public function bootingPackage(): void
    {
        //
    }

    public function registeringPackage(): void
    {
        //
    }
}
