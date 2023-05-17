<?php

namespace App\Ship\Abstracts\Providers;

use AdminKit\Porto\Abstracts\PortoMainServiceProvider;

abstract class AbstractMainServiceProvider extends PortoMainServiceProvider
{
    protected array $serviceProviders = [];
}
