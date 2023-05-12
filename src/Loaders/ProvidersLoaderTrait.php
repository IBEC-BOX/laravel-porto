<?php

namespace AdminKit\Porto\Loaders;

trait ProvidersLoaderTrait
{
    private function loadProvider($serviceProvider): void
    {
        $this->app->register($serviceProvider);
    }

    /**
     * Load the all the registered Service Providers on the Main Service Provider.
     */
    public function loadServiceProviders(): static
    {
        // `$this->serviceProviders` is declared on each Container's Main Service Provider
        foreach ($this->serviceProviders as $serviceProvider) {
            $this->loadProvider($serviceProvider);
        }

        return $this;
    }
}
