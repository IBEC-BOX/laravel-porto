<?php

namespace AdminKit\Porto\Commands;

class FactoryGenerator extends AbstractGeneratorCommand
{
    protected $name = 'make:porto-factory';

    protected $description = 'Create a new Factory class';

    protected $type = 'Factory';

    protected $stubName = 'factory.stub';

    protected $folderInsideContainer = 'Database/Factories';

    protected function getVariables()
    {
        $modelName = $this->argument('name');
        $modelNamespace = $this->getContainerNamespace().'\\Models\\'.$this->argument('name');

        return [
            '{{ modelName }}' => $modelName,
            '{{ modelNamespace }}' => $modelNamespace,
        ];
    }

    protected function getNameInput()
    {
        return parent::getNameInput().'Factory';
    }
}
