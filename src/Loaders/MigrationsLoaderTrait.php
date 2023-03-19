<?php

namespace AdminKit\Porto\Loaders;

use Illuminate\Support\Facades\File;

trait MigrationsLoaderTrait
{
    use PathsLoaderTrait;

    public function loadMigrationsFromContainers($containerPath): void
    {
        $containerMigrationDirectory = $containerPath.'/Data/Migrations';
        $this->loadMigrations($containerMigrationDirectory);
    }

    private function loadMigrations($directory): void
    {
        if (File::isDirectory($directory)) {
            $this->loadMigrationsFrom($directory);
        }
    }

    public function loadMigrationsFromShip(): void
    {
        $shipMigrationDirectory = $this->getShipPath().'/Migrations';
        $this->loadMigrations($shipMigrationDirectory);
    }
}
