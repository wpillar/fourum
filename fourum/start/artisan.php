<?php

use Fourum\Storage\RepositoryRegistry;

/*
|--------------------------------------------------------------------------
| Register The Artisan Commands
|--------------------------------------------------------------------------
|
| Each available Artisan command must be registered with the console so
| that it is available to be called. We'll register every command so
| the console gets access to each of the command object instances.
|
*/

$registry = new RepositoryRegistry(array(
    App::make('Fourum\Storage\User\UserRepositoryInterface'),
    App::make('Fourum\Storage\Forum\ForumRepositoryInterface'),
    App::make('Fourum\Storage\Group\GroupRepositoryInterface'),
    App::make('Fourum\Storage\Post\PostRepositoryInterface'),
    App::make('Fourum\Storage\Thread\ThreadRepositoryInterface')
));

Artisan::add(new Fourum\Commands\InstallCommand($registry));
Artisan::add(new Fourum\Commands\ThemeCompileCommand);
