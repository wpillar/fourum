<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Front Routes
 */
Route::get('/', 'Fourum\Controllers\Front\HomeController@showWelcome');
Route::get('/install', 'Fourum\Controllers\Front\InstallController@index');

// auth routes
Route::controller('auth', 'Fourum\Controllers\Front\AuthController');

// signup routes
Route::get('/register', 'Fourum\Controllers\Front\SignupController@getRegister');
Route::post('/register', 'Fourum\Controllers\Front\SignupController@postRegister');

// forum routes
Route::get('/forum/{id}/{title?}', 'Fourum\Controllers\Front\ForumController@view');

// thread routes
Route::get('/thread/create/{forumId}', 'Fourum\Controllers\Front\ThreadController@getCreate');
Route::get('/thread/{id}/{title?}', 'Fourum\Controllers\Front\ThreadController@view');
Route::post('/thread/create/{forumId}', 'Fourum\Controllers\Front\ThreadController@postCreate');

// post routes
Route::get('/post/create/{threadId}', 'Fourum\Controllers\Front\PostController@getCreate');
Route::get('/post/{id}', 'Fourum\Controllers\Front\PostController@view');
Route::post('/post/create/{threadId}', 'Fourum\Controllers\Front\PostController@postCreate');
Route::post('/post/edit', 'Fourum\Controllers\Front\PostController@postEdit');

/**
 * Admin Routes
 */
Route::group(array('prefix' => 'admin'), function()
{
    Route::get('/', 'Fourum\Controllers\Admin\IndexController@index');

    /**
     * Settings Routes
     */
    Route::get('/settings', 'Fourum\Controllers\Admin\SettingsController@index');
    Route::get('/settings/banning', 'Fourum\Controllers\Admin\SettingsController@banning');
    Route::get('/settings/themes', 'Fourum\Controllers\Admin\SettingsController@themes');
    Route::post('/settings', 'Fourum\Controllers\Admin\SettingsController@save');

    /**
     * Forums Routes
     */
    Route::get('/forums', 'Fourum\Controllers\Admin\ForumsController@index');
    Route::get('/forums/add', 'Fourum\Controllers\Admin\ForumsController@add');
    Route::post('/forums/add', 'Fourum\Controllers\Admin\ForumsController@save');

    /**
     * Users Routes
     */
    Route::get('/users', 'Fourum\Controllers\Admin\UsersController@index');

    /**
     * Groups Routes
     */
    Route::get('/groups', 'Fourum\Controllers\Admin\GroupsController@index');
    Route::get('/groups/add', 'Fourum\Controllers\Admin\GroupsController@add');
    Route::post('/groups/add', 'Fourum\Controllers\Admin\GroupsController@save');

    /**
     * Themes Routes
     */
    Route::get('/themes', 'Fourum\Controllers\Admin\ThemesController@index');

});
