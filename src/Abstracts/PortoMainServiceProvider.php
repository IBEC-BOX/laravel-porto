<?php

namespace AdminKit\Porto\Abstracts;

use AdminKit\Porto\Loaders\AutoLoaderTrait;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

abstract class PortoMainServiceProvider extends LaravelServiceProvider
{
    use AutoLoaderTrait;

    /**
     * Path to the container
     */
    protected string $containerPath;

    /**
     * List of service providers to load
     */
    protected array $serviceProviders = [];

    public function __construct($app)
    {
        $this->containerPath = dirname((new \ReflectionClass($this))->getFileName()).'/..';
        parent::__construct($app);
    }

    public function register(): void
    {
        $this->registerContainer();
    }

    public function boot(): void
    {
        $this->bootContainer();
    }
}
