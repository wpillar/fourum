<?php namespace Fourum\Controllers;

use Config;
use Fourum\Facades\Theme;
use Fourum\Validation\ValidatorRegistry;

class FrontController extends BaseController
{
    protected $validators;

    public function __construct(ValidatorRegistry $registry)
    {
        parent::__construct();

        $this->validators = $registry;

        Theme::setApplication('front');
        Theme::setTheme('default');
        // Theme::setColourScheme('dark');

        if (Config::get('app.debug')) {
            Theme::compile();
        }
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
