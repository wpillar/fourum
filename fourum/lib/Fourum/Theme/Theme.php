<?php namespace Fourum\Theme;

use Fourum\View\FileViewFinder;

/**
 * Theme
 *
 * Class for handling Fourum themes.
 */
class Theme
{
    /**
     * Instance for setting view paths
     *
     * @var Fourum\View\FileViewFinder
     */
    protected $finder;

    /**
     * The name of the current application, 'front' or 'admin'
     *
     * @var string
     */
    protected $application;

    /**
     * The current theme name
     *
     * @var string
     */
    protected $theme;

    /**
     * Set me up with a Fourum\View\FileViewFinder instance.
     *
     * @param FileViewFinder $finder
     */
    public function __construct(FileViewFinder $finder)
    {
        $this->finder = $finder;
    }

    /**
     * Set the application we're currently in, 'front' or 'admin'
     *
     * @param string $dir
     */
    public function setApplication($dir)
    {
        $this->application = $dir;

        $this->setup();
    }

    /**
     * Set the name of the current theme
     *
     * @param string $name
     */
    public function setTheme($name)
    {
        $this->theme = $name;

        $this->setup();
    }

    /**
     * Get the current application
     *
     * @return string
     */
    public function getApplication()
    {
        if (! $this->application) {
            throw new ApplicationNotSetException("Theme: Application Not Set");
        }

        return $this->application;
    }

    /**
     * Get the current theme name
     *
     * @return string
     */
    public function getTheme()
    {
        return $this->theme ? $this->theme : 'default';
    }

    /**
     * Inject the current view path (themes/<application>/<theme>/views) into
     * the instance of FileViewFinder
     */
    private function setup()
    {
        $paths = array(
            public_path("themes/{$this->getApplication()}/{$this->getTheme()}/views"),
            public_path("themes/{$this->getApplication()}/default/views")
        );

        $this->finder->setPaths($paths);
    }
}
