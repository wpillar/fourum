<?php namespace Fourum\Controllers;

use Fourum\Facades\Theme;
use Config;
use Fourum\Storage\Setting\Manager;
use Illuminate\Support\Facades\View;

class AdminController extends BaseController
{
    protected $settings;

    public function __construct(Manager $settings)
    {
        parent::__construct();

        $this->beforeFilter('admin.auth');

        $this->settings = $settings;

        Theme::setApplication('admin');
        Theme::setTheme('default');

        if (Config::get('app.debug')) {
            Theme::compile();
        }

        $generalName = $this->settings->get('general.name');

        View::composer('header', function($view) use ($generalName) {
            $view->with('forumName', $generalName);
        });
    }
}
