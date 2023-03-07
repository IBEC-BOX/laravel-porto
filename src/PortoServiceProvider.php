<?php

namespace AdminKit\Porto;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use AdminKit\Porto\Commands\PortoCommand;

class PortoServiceProvider extends PackageServiceProvider
{
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
}
