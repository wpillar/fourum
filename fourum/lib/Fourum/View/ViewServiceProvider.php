<?php namespace Fourum\View;

use Illuminate\View\ViewServiceProvider as IlluminateViewServiceProvider;

/**
 * View Service Provider
 */
class ViewServiceProvider extends IlluminateViewServiceProvider
{
    /**
     * Ovveride registerViewFinder to use Fourum\View\FileViewFinder
     */
    public function registerViewFinder()
    {
        $this->app['view.finder'] = $this->app->share(function($app)
        {
            $paths = $app['config']['view.paths'];

            return new FileViewFinder($app['files'], $paths);
        });
    }
}
