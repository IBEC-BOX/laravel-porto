<?php

namespace AdminKit\Porto\Loaders;

use Illuminate\Support\Facades\File;

trait MigrationsLoaderTrait
{
    use PathsLoaderTrait;

    public function loadMigrationsFromContainers($containerPath): void
    {
        $this->loadMigrations($containerPath.'/Data/Migrations'); // TODO remove this line in v2
        $this->loadMigrations($containerPath.'/Database/Migrations');
    }

    private function loadMigrations($directory): void
    {
        if (File::isDirectory($directory)) {
            $this->loadMigrationsFrom($directory);
        }
    }

    public function loadMigrationsFromShip(): void
    {
        $this->loadMigrations($this->getShipPath().'/Migrations');
    }
}
