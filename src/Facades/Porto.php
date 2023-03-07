<?php

namespace AdminKit\Porto\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AdminKit\Porto\Porto
 */
class Porto extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \AdminKit\Porto\Porto::class;
    }
}
