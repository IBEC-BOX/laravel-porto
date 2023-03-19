<?php

namespace AdminKit\Porto\Loaders;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;

trait HelpersLoaderTrait
{
    use PathsLoaderTrait;

    public function loadHelpersFromContainers($containerPath): void
    {
        $containerHelpersDirectory = $containerPath.'/Helpers';
        $this->loadHelpers($containerHelpersDirectory);
    }

    private function loadHelpers($helpersFolder): void
    {
        if (File::isDirectory($helpersFolder)) {
            $files = File::files($helpersFolder);

            foreach ($files as $file) {
                try {
                    require $file;
                } catch (FileNotFoundException $e) {
                }
            }
        }
    }

    public function loadHelpersFromShip(): void
    {
        $shipHelpersDirectory = $this->getShipPath().'/Helpers';
        $this->loadHelpers($shipHelpersDirectory);
    }
}
