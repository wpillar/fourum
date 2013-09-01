<?php namespace Fourum\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Theme Facade
 */
class Theme extends Facade
{
    /**
     * Get the Facade accessor for IoC resolution
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'theme';
    }
}
