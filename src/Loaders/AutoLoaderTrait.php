<?php

namespace AdminKit\Porto\Loaders;

trait AutoLoaderTrait
{
    use ConfigsLoaderTrait;
    use LocalizationLoaderTrait;
    use MigrationsLoaderTrait;
    use ViewsLoaderTrait;
    use ProvidersLoaderTrait;
    use CommandsLoaderTrait;
    use AliasesLoaderTrait;
    use HelpersLoaderTrait;

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
