<?php

namespace AdminKit\Porto\Loaders;

trait AutoLoaderTrait
{
    use AliasesLoaderTrait;
    use CommandsLoaderTrait;
    use ConfigsLoaderTrait;
    use HelpersLoaderTrait;
    use LocalizationLoaderTrait;
    use MigrationsLoaderTrait;
    use ProvidersLoaderTrait;
    use ViewsLoaderTrait;

    public function registerContainer(): void
    {
        $this->loadServiceProviders();
        $this->loadConfigsFromContainers($this->containerPath);
        $this->loadLocalsFromContainers($this->containerPath);
    }

    public function bootContainer(): void
    {
        $this->loadMigrationsFromContainers($this->containerPath);
        $this->loadViewsFromContainers($this->containerPath);
        $this->loadHelpersFromContainers($this->containerPath);
        $this->loadCommandsFromContainers($this->containerPath);
    }
}
