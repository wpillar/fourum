<?php namespace Fourum\Controllers;

use Fourum\Facades\Theme;
use Config;

class FrontController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        Theme::setApplication('front');
        Theme::setTheme('default');
        // Theme::setColourScheme('dark');

        if (Config::get('app.debug')) {
            Theme::compile();
        }
    }
}
