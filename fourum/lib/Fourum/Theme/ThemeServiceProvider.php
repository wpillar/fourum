<?php namespace Fourum\Theme;

use Illuminate\Support\ServiceProvider;

/**
 * Theme Service Provider
 */
class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register the provider and setup a Theme object
     * by injecting an instance of Fourum\View\FileViewFinder
     */
    public function register()
    {
        $this->app['theme'] = $this->app->share(function($app) {
            return new Theme($app['view.finder']);
        });
    }
}
