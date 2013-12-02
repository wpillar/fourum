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
        Theme::setTheme('default');
        // Theme::setColourScheme('dark');

        if (Config::get('app.debug')) {
            Theme::compile();
        }

        $generalName = $this->getSetting('general.name');

        View::composer('header', function($view) use ($generalName) {
            $view->with('forumName', $generalName);
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
