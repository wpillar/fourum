<?php namespace Fourum\Controllers;

use Illuminate\Support\Facades\View;
use Fourum\Facades\Theme;
use Config;

class FrontController extends BaseController
{
    public function __construct()
    {
        Theme::setApplication('front');
        Theme::setTheme('default');

        if (Config::get('app.debug')) {
            Theme::compile();
        }
    }
}
