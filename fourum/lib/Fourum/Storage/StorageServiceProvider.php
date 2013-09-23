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
            'Fourum\Storage\Group\GroupRepositoryInterface',
            'Fourum\Storage\Group\EloquentGroupRepository'
        );

        $this->app->bind(
            'Fourum\Storage\Post\PostRepositoryInterface',
            'Fourum\Storage\Post\EloquentPostRepository'
        );

        $this->app->bind(
            'Fourum\Storage\Thread\ThreadRepositoryInterface',
            'Fourum\Storage\Thread\EloquentThreadRepository'
        );
    }
}
