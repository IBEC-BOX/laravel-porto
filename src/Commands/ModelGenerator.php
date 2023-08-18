<?php

namespace AdminKit\Porto\Commands;

class ModelGenerator extends AbstractGeneratorCommand
{
    protected $name = 'make:porto-model';

    protected $description = 'Create a new Model class';

    protected $type = 'Model';

    protected $stubName = 'model.stub';

    protected $folderInsideContainer = 'Models';

    protected function getVariables()
    {
        $factoryNamespace = $this->getContainerNamespace().'\\Database\\Factories\\'.
            $this->argument('name').'Factory';

        return [
            '{{ factoryNamespace }}' => $factoryNamespace,
        ];
    }
}
