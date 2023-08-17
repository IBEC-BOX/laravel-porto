<?php

namespace AdminKit\Porto\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class ModelGenerator extends GeneratorCommand
{
    protected $name = 'make:porto-model';

    protected $description = 'Create a new Model class';

    protected $type = 'Model';

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the ' . strtolower($this->type)],
            ['container', InputArgument::REQUIRED, 'The container name'],
            ['folder', InputArgument::OPTIONAL, 'The folder name', 'Containers'],
        ];
    }

    protected function getStub()
    {
        return $this->resolveStubPath('model.stub');
    }

    protected function resolveStubPath($stubName)
    {
        return file_exists($path = base_path('stubs/porto/' . $stubName))
            ? $path
            : __DIR__ . '/stubs/' . $stubName;
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '/' . $this->argument('folder') . '/' . $this->argument('container') . '/Models';
    }
}
