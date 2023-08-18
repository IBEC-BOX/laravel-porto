<?php

namespace AdminKit\Porto\Commands;

use Symfony\Component\Console\Input\InputOption;

class ApiControllerGenerator extends AbstractGeneratorCommand
{
    protected $name = 'make:porto-api-controller';

    protected $description = 'Create a new API Controller class';

    protected $type = 'Controller';

    protected $stubName = 'api.controller.stub';

    protected $folderInsideContainer = 'UI/API/Controllers';

    public function handle()
    {
        parent::handle();

        $arguments = [
            'name' => $name = $this->argument('name'),
            'container' => $this->argument('container'),
            'folder' => $this->argument('folder'),
        ];

        if ($this->option('requests')) {
            $this->call('make:porto-api-request', array_merge($arguments, ['name' => "Create$name"]));
            $this->call('make:porto-api-request', array_merge($arguments, ['name' => "Update$name"]));
        }

        if ($this->option('resource')) {
            $this->call('make:porto-api-resource', $arguments);
        }
    }

    protected function getVariables()
    {
        $name = $this->argument('name');
        $storeRequestName = $updateRequestName = 'Request';
        $useNamespaces = 'use Illuminate\Http\Request;';
        $bodyOfIndexFunction = '//';
        $bodyOfShowFunction = '//';

        if ($this->option('requests')) {
            $storeRequestName = "Create{$name}Request";
            $updateRequestName = "Update{$name}Request";
            $useNamespaces = 'use '.$this->getContainerNamespace()."\\UI\\API\\Requests\\$storeRequestName;\n";
            $useNamespaces .= 'use '.$this->getContainerNamespace()."\\UI\\API\\Requests\\$updateRequestName;";
        }

        if ($this->option('resource')) {
            $modelName = $name;
            $resourceName = "{$name}Resource";
            $useNamespaces .= "\n";
            $useNamespaces .= 'use '.$this->getContainerNamespace()."\\UI\\API\\Resources\\$resourceName;\n";
            $useNamespaces .= 'use '.$this->getContainerNamespace()."\\Models\\$modelName;";
            $bodyOfIndexFunction = "return $resourceName::collection($modelName::all());";
            $bodyOfShowFunction = "return $resourceName::make($modelName::findOrFail(\$id));";
        }

        return [
            '{{ useNamespaces }}' => $useNamespaces,
            '{{ storeRequestName }}' => $storeRequestName,
            '{{ updateRequestName }}' => $updateRequestName,
            '{{ bodyOfIndexFunction }}' => $bodyOfIndexFunction,
            '{{ bodyOfShowFunction }}' => $bodyOfShowFunction,
        ];
    }

    protected function getNameInput()
    {
        return parent::getNameInput().'Controller';
    }

    protected function getOptions()
    {
        return [
            ['resource', 'r', InputOption::VALUE_NONE, 'Create new resource class'],
            ['requests', 'R', InputOption::VALUE_NONE, 'Create new form request classes'],
        ];
    }
}
