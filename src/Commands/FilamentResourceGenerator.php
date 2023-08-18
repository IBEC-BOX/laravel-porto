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

    public function handle()
    {
        parent::handle();

        $name = $this->qualifyClass($this->getNameInput());
        $this->makeFilamentResourcePage($name, 'Create');
        $this->makeFilamentResourcePage($name, 'Edit');
        $this->makeFilamentResourcePage($name, 'List');
    }

    protected function getVariables()
    {
        return [
            '{{ modelName }}' => $name = $this->argument('name'),
            '{{ modelNamespace }}' => $this->getContainerNamespace() . '\\Models\\' . $name,
            '{{ label }}' => $name,
            '{{ pluralLabel }}' => Str::plural($name),
        ];
    }

    protected function getNameInput()
    {
        return parent::getNameInput() . 'Resource';
    }

    protected function makeFilamentResourcePage($name, $page)
    {
        $stubPath = file_exists($path = base_path('stubs/porto/' . 'filament.resource.' . strtolower($page) . '.stub'))
            ? $path
            : __DIR__ . '/stubs/' . 'filament.resource.' . strtolower($page) . '.stub';

        $stub = $this->files->get($stubPath);
        $stub = $this->replaceVariables($stub)
            ->replaceNamespace($stub, $name)
            ->replaceClass($stub, $name);

        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $pageFilepath = $this->laravel['path'] . '/' .
            str_replace('\\', '/', $name) . '/Pages/' .
            ucfirst($page) . $this->argument('name') . '.php';
        $this->makeDirectory($pageFilepath);

        $this->files->put($pageFilepath, $this->sortImports($stub));
    }
}
