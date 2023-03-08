<?php

namespace AdminKit\Porto;

use AdminKit\Porto\Loaders\AutoLoaderTrait;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use AdminKit\Porto\Commands\PortoCommand;

class PortoServiceProvider extends PackageServiceProvider
{
    use AutoLoaderTrait;

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('porto')
            ->hasConfigFile()
            ->hasCommand(PortoCommand::class);
    }

    public function bootingPackage()
    {
        $this->runLoaderBoot();
    }

    public function registeringPackage()
    {
        $this->runLoaderRegister();
    }
}
