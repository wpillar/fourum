<?php namespace Fourum\Controllers\Admin;

use Fourum\Controllers\AdminController;
use Illuminate\Support\Facades\View;

class UsersController extends AdminController
{
    public function index()
    {
        echo View::make('users.index');
    }
}
