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

Route::get('/', 'Fourum\Controllers\HomeController@showWelcome');
Route::get('/install', 'Fourum\Controllers\InstallController@index');
Route::get('/auth', 'Fourum\Controllers\AuthController@index');
