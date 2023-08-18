<?php

namespace AdminKit\Porto\Commands;

use Illuminate\Support\Str;
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

        if ($this->option('requests')) {
            $this->call('make:porto-api-request', [
                'name' => 'Create' .$this->argument('name'),
                'container' => $this->argument('container'),
                'folder' => $this->argument('folder'),
            ]);
            $this->call('make:porto-api-request', [
                'name' => 'Update' .$this->argument('name'),
                'container' => $this->argument('container'),
                'folder' => $this->argument('folder'),
            ]);
        }
    }

    protected function getVariables()
    {
        $storeRequestName = $updateRequestName = 'Request';
        $useNamespaces = 'use Illuminate\Http\Request;';

        if ($this->option('requests')) {
            $storeRequestName = 'Create' . $this->argument('name') . 'Request';
            $updateRequestName = 'Update' . $this->argument('name') . 'Request';
            $useNamespaces = 'use ' . $this->getContainerNamespace() . "\\UI\\API\\Requests\\$storeRequestName;\n";
            $useNamespaces .= 'use ' . $this->getContainerNamespace() . "\\UI\\API\\Requests\\$updateRequestName;";
        }

        return [
            '{{ useNamespaces }}' => $useNamespaces,
            '{{ storeRequestName }}' => $storeRequestName,
            '{{ updateRequestName }}' => $updateRequestName,
        ];
    }

    protected function getNameInput()
    {
        return parent::getNameInput() . 'Controller';
    }

    protected function getOptions()
    {
        return [
            [
                'resource',
                'r',
                InputOption::VALUE_NONE,
                'Indicates if the generated controller should be a resource controller'
            ],
            [
                'requests',
                'R',
                InputOption::VALUE_NONE,
                'Create new form request classes and use them in the resource controller'
            ],
        ];
    }
}
