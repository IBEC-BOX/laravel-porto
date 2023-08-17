<?php

namespace AdminKit\Porto\Commands;

use Illuminate\Support\Str;

class FilamentResourceGenerator extends AbstractGeneratorCommand
{
    protected $name = 'make:porto-filament-resource';

    protected $description = 'Create a new Filament Resource files';

    protected $type = 'Filament Resource';

    protected $stubName = 'filament.resource.stub';

    protected $folderInsideContainer = 'UI/Filament/Resources';

    protected function getVariables()
    {
        return [
            '{{ modelName }}' => $this->argument('name'),
            '{{ modelNamespace }}' => $this->getContainerNamespace() . '\\Models\\' . $this->argument('name'),
        ];
    }

    protected function getNameInput()
    {
        return parent::getNameInput() . 'Resource';
    }

    protected function buildClass($name)
    {
        $this->makeFilamentResourcePage($name, 'Create');
        $this->makeFilamentResourcePage($name, 'Edit');
        $this->makeFilamentResourcePage($name, 'List');

        $stub = $this->files->get($this->getStub());

        return $this->replaceVariables($stub)
            ->replaceNamespace($stub, $name)
            ->replaceClass($stub, $name);
    }

    protected function makeFilamentResourcePage($name, $page)
    {
        $stubPath = file_exists($path = base_path('stubs/porto/' . 'filament.resource.'.strtolower($page).'.stub'))
            ? $path
            : __DIR__ . '/stubs/' . 'filament.resource.'.strtolower($page).'.stub';

        $stub = $this->files->get($stubPath);
        $stub = $this->replaceVariables($stub)
            ->replaceNamespace($stub, $name)
            ->replaceClass($stub, $name);

        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $pageFilepath = $this->laravel['path'].'/'.
            str_replace('\\', '/', $name).'/Pages/'.
            ucfirst($page).$this->argument('name').'.php';
        $this->makeDirectory($pageFilepath);

        $this->files->put($pageFilepath, $this->sortImports($stub));
    }
}
