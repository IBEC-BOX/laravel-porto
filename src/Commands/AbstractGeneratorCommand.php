<?php

namespace AdminKit\Porto\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

abstract class AbstractGeneratorCommand extends GeneratorCommand
{
    protected $stubName;
    protected $folderInsideContainer;

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
        return file_exists($path = base_path('stubs/porto/' . $this->stubName))
            ? $path
            : __DIR__ . '/stubs/' . $this->stubName;
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '/' .
            $this->argument('folder') . '/' .
            $this->argument('container') . '/' .
            $this->folderInsideContainer;
    }

    protected function getVariables()
    {
        return [
            // '{{ search }}' => 'replace',
        ];
    }

    protected function replaceVariables(&$stub)
    {
        foreach ($this->getVariables() as $key => $value) {
            $stub = str_replace($key, $value, $stub);
        }

        return $this;
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceVariables($stub)
            ->replaceNamespace($stub, $name)
            ->replaceClass($stub, $name);
    }
}
