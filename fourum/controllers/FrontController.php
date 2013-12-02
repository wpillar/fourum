<?php namespace Fourum\Controllers;

use Config;
use Fourum\Facades\Theme;
use Fourum\Storage\Setting\Manager;
use Fourum\Validation\ValidatorRegistry;
use Illuminate\Support\Facades\View;

class FrontController extends BaseController
{
    /**
     * @var \Fourum\Validation\ValidatorRegistry
     */
    protected $validators;

    /**
     * @param ValidatorRegistry $registry
     * @param Manager $settings
     */
    public function __construct(ValidatorRegistry $registry, Manager $settings)
    {
        parent::__construct($settings);

        $this->validators = $registry;

        Theme::setApplication('front');
        Theme::setTheme($this->getSetting('theme.current'));
        // Theme::setColourScheme('dark');

        if (Config::get('app.debug')) {
            Theme::compile();
        }

        $data['general.name'] = $this->getSetting('general.name');
        $data['user'] = $this->getUser();

        View::composer('header', function($view) use ($data) {
            $view->with('forumName', $data['general.name']);
            $view->with('user', $data['user']);
        });

        View::composer('footer', function ($view) use ($data) {
            $view->with('user', $data['user']);
        });

        View::composer('meta', function ($view) use ($data) {
            $view->with('forumName', $data['general.name']);
        });
    }

    /**
     * @param string $name
     * @return \Fourum\Validation\ValidatorInterface
     */
    public function getValidator($name)
    {
        return $this->validators->get($name);
    }
}
