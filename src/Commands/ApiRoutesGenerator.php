<?php

namespace AdminKit\Porto\Commands;

use Illuminate\Support\Str;

class ApiRoutesGenerator extends AbstractGeneratorCommand
{
    protected $name = 'make:porto-api-routes';

    protected $description = 'Create a new Route file';

    protected $type = 'Route';

    protected $stubName = 'api.routes.stub';

    protected $folderInsideContainer = 'UI/API/Routes';

    protected function getVariables()
    {
        $name = $this->argument('name');
        $controllerNamespace = $this->getContainerNamespace()."\\UI\\API\\Controllers\\{$name}Controller";

        return [
            '{{ controllerNamespace }}' => $controllerNamespace,
            '{{ controllerName }}' => "{$name}Controller",
            '{{ route }}' => Str::snake(Str::plural($name), '-'),
        ];
    }

    public function getNameInput()
    {
        return 'api';
    }
}
