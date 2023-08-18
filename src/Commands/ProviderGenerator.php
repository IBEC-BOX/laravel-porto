<?php

namespace AdminKit\Porto\Commands;

class ProviderGenerator extends AbstractGeneratorCommand
{
    protected $name = 'make:porto-provider';

    protected $description = 'Create a new ServiceProvider class';

    protected $type = 'ServiceProvider';

    protected $stubName = 'provider.stub';

    protected $folderInsideContainer = 'Providers';

    protected function getNameInput()
    {
        return parent::getNameInput() . 'ServiceProvider';
    }
}
