<?php

namespace Jpaylaga\MachshipWrapper\Facades;

use Illuminate\Support\Facades\Facade;

class Machship extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'machship';
    }
}
