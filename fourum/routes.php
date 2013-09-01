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
Route::get('/login', 'Fourum\Controllers\Front\AuthController@login');

/**
 * Admin Routes
 */
Route::group(array('prefix' => 'admin'), function()
{
    Route::get('/', 'Fourum\Controllers\Admin\IndexController@index');
});
