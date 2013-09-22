<?php namespace Fourum\Controllers\Admin;

use Fourum\Controllers\AdminController;
use Illuminate\Support\Facades\View;

class ForumsController extends AdminController
{
    public function index()
    {
        echo View::make('forums.index');
    }
}
