<?php

namespace AdminKit\Porto\Generator;

use AdminKit\Porto\Generator\Commands\ActionGenerator;
use AdminKit\Porto\Generator\Commands\ConfigurationGenerator;
use AdminKit\Porto\Generator\Commands\ContainerApiGenerator;
use AdminKit\Porto\Generator\Commands\ContainerGenerator;
use AdminKit\Porto\Generator\Commands\ContainerWebGenerator;
use AdminKit\Porto\Generator\Commands\ControllerGenerator;
use AdminKit\Porto\Generator\Commands\EventGenerator;
use AdminKit\Porto\Generator\Commands\EventListenerGenerator;
use AdminKit\Porto\Generator\Commands\ExceptionGenerator;
use AdminKit\Porto\Generator\Commands\JobGenerator;
use AdminKit\Porto\Generator\Commands\MailGenerator;
use AdminKit\Porto\Generator\Commands\MiddlewareGenerator;
use AdminKit\Porto\Generator\Commands\MigrationGenerator;
use AdminKit\Porto\Generator\Commands\ModelFactoryGenerator;
use AdminKit\Porto\Generator\Commands\ModelGenerator;
use AdminKit\Porto\Generator\Commands\NotificationGenerator;
use AdminKit\Porto\Generator\Commands\PolicyGenerator;
use AdminKit\Porto\Generator\Commands\ReadmeGenerator;
use AdminKit\Porto\Generator\Commands\RepositoryGenerator;
use AdminKit\Porto\Generator\Commands\RequestGenerator;
use AdminKit\Porto\Generator\Commands\RouteGenerator;
use AdminKit\Porto\Generator\Commands\SeederGenerator;
use AdminKit\Porto\Generator\Commands\ServiceProviderGenerator;
use AdminKit\Porto\Generator\Commands\SubActionGenerator;
use AdminKit\Porto\Generator\Commands\TaskGenerator;
use AdminKit\Porto\Generator\Commands\TestFunctionalTestGenerator;
use AdminKit\Porto\Generator\Commands\TestTestCaseGenerator;
use AdminKit\Porto\Generator\Commands\TestUnitTestGenerator;
use AdminKit\Porto\Generator\Commands\TransformerGenerator;
use AdminKit\Porto\Generator\Commands\ValueGenerator;
use Illuminate\Support\ServiceProvider;

class GeneratorsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands($this->getGeneratorCommands());
        }
    }

    private function getGeneratorCommands(): array
    {
        // add your generators here
        return $generatorCommands = [
            ActionGenerator::class,
            ConfigurationGenerator::class,
            ContainerGenerator::class,
            ContainerApiGenerator::class,
            ContainerWebGenerator::class,
            ControllerGenerator::class,
            EventGenerator::class,
            EventListenerGenerator::class,
            ExceptionGenerator::class,
            JobGenerator::class,
            ModelFactoryGenerator::class,
            MailGenerator::class,
            MiddlewareGenerator::class,
            MigrationGenerator::class,
            ModelGenerator::class,
            NotificationGenerator::class,
            PolicyGenerator::class,
            ReadmeGenerator::class,
            RepositoryGenerator::class,
            RequestGenerator::class,
            RouteGenerator::class,
            SeederGenerator::class,
            ServiceProviderGenerator::class,
            SubActionGenerator::class,
            TestFunctionalTestGenerator::class,
            TestTestCaseGenerator::class,
            TestUnitTestGenerator::class,
            TaskGenerator::class,
            TransformerGenerator::class,
            ValueGenerator::class,
        ];
    }
}
