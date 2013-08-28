<?php namespace Fourum\Storage;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'Fourum\Storage\User\UserRepositoryInterface',
            'Fourum\Storage\User\EloquentUserRepository'
        );
    }
}
