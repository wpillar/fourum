<?php namespace Fourum\Controllers;

use Fourum\Facades\Theme;
use Config;
use Fourum\Storage\Setting\SettingRepositoryInterface;
use Illuminate\Support\Facades\View;

class AdminController extends BaseController
{
    protected $settings;

    public function __construct(SettingRepositoryInterface $settings)
    {
        // $this->beforeFilter('admin.auth');

        $this->settings = $settings;

        Theme::setApplication('admin');
        Theme::setTheme('default');

        if (Config::get('app.debug')) {
            Theme::compile();
        }

        View::composer('header', function($view) {
            $view->with('forumName', $this->settings->get('general.name'));
        });
    }
}
