<?php

namespace AdminKit\Porto\Loaders;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait ProvidersLoaderTrait
{
    use PathsLoaderTrait;

    /**
     * Loads only the Main Service Providers from the Containers.
     * All the Service Providers (registered inside the main), will be
     * loaded from the `boot()` function on the parent of the Main
     * Service Providers.
     */
    public function loadMainServiceProvidersFromContainers($containerPath): static
    {
        $containerProvidersDirectory = $containerPath.'/Providers';
        $this->loadProviders($containerProvidersDirectory);

        return $this;
    }

    private function loadProviders($directory): void
    {
        $mainServiceProviderNameStartWith = 'Main';

        if (File::isDirectory($directory)) {
            $files = File::allFiles($directory);

            foreach ($files as $file) {
                if (File::isFile($file)) {
                    // Check if this is the Main Service Provider
                    if (Str::startsWith($file->getFilename(), $mainServiceProviderNameStartWith)) {
                        $serviceProviderClass = $this->getClassFullNameFromFile($file->getPathname());
                        $this->loadProvider($serviceProviderClass);
                    }
                }
            }
        }
    }

    private function loadProvider($providerFullName): void
    {
        App::register($providerFullName);
    }

    /**
     * Load the all the registered Service Providers on the Main Service Provider.
     */
    public function loadServiceProviders(): static
    {
        // `$this->serviceProviders` is declared on each Container's Main Service Provider
        foreach ($this->serviceProviders ?? [] as $provider) {
            if (class_exists($provider)) {
                $this->loadProvider($provider);
            }
        }

        return $this;
    }

    public function loadShipServiceProviderFromShip(): void
    {
        $shipProviderFile = $this->getShipPath().'/Providers/ShipProvider.php';

        if (file_exists($shipProviderFile)) {
            $shipProviderClass = $this->getClassFullNameFromFile($shipProviderFile);
            $this->loadProvider($shipProviderClass);
        }
    }
}
