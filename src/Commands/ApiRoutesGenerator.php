<?php

namespace AdminKit\Porto\Commands;

class ApiRoutesGenerator extends AbstractGeneratorCommand
{
    protected $name = 'make:porto-api-routes';

    protected $description = 'Create a new Route file';

    protected $type = 'Route';

    protected $stubName = 'api.routes.stub';

    protected $folderInsideContainer = 'UI/API/Routes';

    protected function getVariables()
    {
        $controllerNamespace = $this->rootNamespace() .
            $this->argument('folder') . '\\' .
            $this->argument('container') . '\\UI\\API\\Controllers\\' .
            $this->argument('name') . 'Controller';

        return [
            '{{ controllerNamespace }}' => $controllerNamespace,
            '{{ controllerName }}' => $this->argument('name') . 'Controller',
            '{{ route }}' => strtolower($this->argument('name')),
        ];
    }

    public function getNameInput()
    {
        return 'api';
    }
}
