<?php

namespace Displore\Themes\Facades;

use Illuminate\Support\Facades\Facade;

class Theme extends Facade
{
    /**
     * Get the binding in the IoC container.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'theme';
    }
}
