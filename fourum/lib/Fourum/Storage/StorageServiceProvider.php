<?php namespace Fourum\Storage;

use Illuminate\Support\ServiceProvider;

/**
 * Storage Service Provider
 *
 * Setup all the necessary bindings and the like for Storage
 * related classes.
 */
class StorageServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Fourum\Storage\User\UserRepositoryInterface',
            'Fourum\Storage\User\EloquentUserRepository'
        );

        $this->app->bind(
            'Fourum\Storage\Forum\ForumRepositoryInterface',
            'Fourum\Storage\Forum\EloquentForumRepository'
        );

        $this->app->bind(
            'Fourum\Storage\Forum\GroupRepositoryInterface',
            'Fourum\Storage\Forum\EloquentGroupRepository'
        );

        $this->app->bind(
            'Fourum\Storage\Forum\PostRepositoryInterface',
            'Fourum\Storage\Forum\EloquentPostRepository'
        );

        $this->app->bind(
            'Fourum\Storage\Forum\ThreadRepositoryInterface',
            'Fourum\Storage\Forum\EloquentThreadRepository'
        );
    }
}
