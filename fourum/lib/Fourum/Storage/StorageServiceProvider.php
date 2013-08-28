<?php namespace Fourum\Storage;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'Fourum\Lib\Storage\User\UserRepositoryInterface',
            'Fourum\Lib\Storage\User\EloquentUserRepository'
        );
    }
}
