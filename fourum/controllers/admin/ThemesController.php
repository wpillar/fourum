<?php namespace Fourum\Controllers\Admin;

use Fourum\Controllers\AdminController;
use Fourum\Facades\Theme;
use Illuminate\Support\Facades\View;

class ThemesController extends AdminController
{
    public function index()
    {
        return View::make('themes.index');
    }
}
