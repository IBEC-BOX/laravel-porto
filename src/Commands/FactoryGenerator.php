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
        $modelName = str_replace('Factory', '', $this->argument('name'));
        $modelNamespace = $this->rootNamespace() .
            $this->argument('folder') . '\\' .
            $this->argument('container') . '\\Models\\' .
            $modelName;

        return [
            '{{ modelName }}' => $modelName,
            '{{ modelNamespace }}' => $modelNamespace,
        ];
    }
}
