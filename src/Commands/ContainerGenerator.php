<?php

namespace AdminKit\Porto\Commands;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

class ContainerGenerator extends AbstractGeneratorCommand
{
    protected $signature = 'make:porto-container {name} {folder=Containers}';

    protected $description = 'Create a new Container';

    protected $type = 'Container';

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the '.strtolower($this->type)],
            ['folder', InputArgument::OPTIONAL, 'The folder name', 'Containers'],
        ];
    }

    public function handle(): void
    {
        // without using parent::handle();

        $arguments = [
            'name' => Str::ucfirst(Str::singular($this->argument('name'))),
            'container' => $this->argument('name'),
            'folder' => $this->argument('folder'),
        ];

        $this->call('make:porto-migration', $arguments);
        $this->call('make:porto-model', $arguments);
        $this->call('make:porto-factory', $arguments);
        $this->call('make:porto-api-controller', [...$arguments, '-r' => true, '-R' => true]);
        $this->call('make:porto-api-routes', $arguments);
        $this->call('make:porto-filament-resource', $arguments);

        $this->makeProviders();
    }

    protected function getVariables()
    {
        return [
            '{{ class }}' => $name = Str::ucfirst(Str::singular($this->argument('name'))),
            '{{ namespace }}' => $this->getContainerNamespace().'\\Providers',
            '{{ name }}' => Str::snake($name, '-'),
            '{{ resourceNamespace }}' => $this->getContainerNamespace()."\\UI\\Filament\\Resources\\{$name}Resource",
        ];
    }

    protected function makeProviders()
    {
        $this->addArgument(name: 'container', default: Str::ucfirst(Str::singular($this->argument('name'))));
        $this->makeFileInContainer('Providers/MainServiceProvider.php', 'main.service.provider.stub');
        $this->makeFileInContainer('Providers/FilamentServiceProvider.php', 'filament.service.provider.stub');
        $this->makeFileInContainer('Providers/RouteServiceProvider.php', 'route.service.provider.stub');
        $this->addMainProviderIntoShip();
    }
}
