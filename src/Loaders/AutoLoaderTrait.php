<?php

namespace AdminKit\Porto\Loaders;

trait AutoLoaderTrait
{
    // Using each component loader trait
    use ConfigsLoaderTrait;
    use LocalizationLoaderTrait;
    use MigrationsLoaderTrait;
    use ViewsLoaderTrait;
    use ProvidersLoaderTrait;
    use CommandsLoaderTrait;
    use AliasesLoaderTrait;
    use HelpersLoaderTrait;
    use PathsLoaderTrait;

    public function runLoaderBoot(): void
    {
        $this->loadMigrationsFromShip();
        $this->loadViewsFromShip();
        $this->loadHelpersFromShip();
        $this->loadCommandsFromShip();

        // Iterate over all the containers folders and autoload most of the components
        foreach ($this->getAllContainerPaths() as $containerPath) {
            $this->loadMigrationsFromContainers($containerPath);
            $this->loadViewsFromContainers($containerPath);
            $this->loadHelpersFromContainers($containerPath);
            $this->loadCommandsFromContainers($containerPath);
        }
    }

    public function runLoaderRegister(): void
    {
        $this->loadConfigsFromShip();
        $this->loadShipServiceProviderFromShip();
        $this->loadLocalsFromShip();

        foreach ($this->getAllContainerPaths() as $containerPath) {
            $this->loadConfigsFromContainers($containerPath);
            $this->loadMainServiceProvidersFromContainers($containerPath);
            $this->loadLocalsFromContainers($containerPath);
        }
    }
}
