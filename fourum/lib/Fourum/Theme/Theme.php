<?php namespace Fourum\Theme;

use Fourum\View\FileViewFinder;
use File;
use lessc;

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
     * The current colour scheme for the current theme
     *
     * @var string
     */
    protected $colourScheme;

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
     * Sets the colour scheme for the current theme.
     *
     * @param string $name
     */
    public function setColourScheme($name)
    {
        $this->colourScheme = $name;
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
     * Gets the name of the current colour scheme for the current theme.
     *
     * @return string
     */
    public function getColourScheme()
    {
        return $this->colourScheme ? $this->colourScheme : 'default';
    }

    /**
     * Get the path for a certain asset
     *
     * @param  string $path
     * @return string
     */
    public function getAssetPath($path)
    {
        return public_path("themes/{$this->getApplication()}/{$this->getTheme()}/{$path}");
    }

    /**
     * Output the asset path for a CSS file.
     *
     * @param  string $path
     * @return string
     */
    public function css($path)
    {
        return asset("themes/{$this->getApplication()}/{$this->getTheme()}/stylesheets/css/{$path}");
    }

    /**
     * Output the asset path for a JavaScript file.
     *
     * @param  string $path
     * @return string
     */
    public function js($path)
    {
        return asset("themes/{$this->getApplication()}/{$this->getTheme()}/js/{$path}");
    }

    /**
     * Get filesystem paths for all stylesheets in the current theme.
     *
     * @param  string $type
     * @return array
     */
    public function getStylesheets($type = null)
    {
        if ('less' === $type) {
            return File::files(public_path("themes/{$this->getApplication()}/{$this->getTheme()}/stylesheets/less"));
        }
        else  {
            return File::files(public_path("themes/{$this->getApplication()}/{$this->getTheme()}/stylesheets/css"));
        }
    }

    /**
     * Compile any files in the theme that require it.
     *
     * @return void
     */
    public function compile()
    {
        $this->compileCss();
    }

    /**
     * Compile any LESS files in the theme.
     *
     * @return void
     */
    private function compileCss()
    {
        $compiler = new lessc;
        $compiler->setFormatter('compressed');
        $compiler->setImportDir(array(public_path("themes/{$this->getApplication()}/{$this->getTheme()}/stylesheets/less")));

        $lessFiles = $this->getStylesheets('less');

        foreach ($lessFiles as $lessFile) {
            // Get the file name
            $pathBits = explode('/', $lessFile);
            $file = end($pathBits);
            $fileBits = explode('.', $file);
            $filename = $fileBits[0];

            // Setup the LESS string
            $schemeName = $this->getColourScheme();
            $scheme = "@import 'schemes/{$schemeName}.less';";
            $less = file_get_contents($lessFile);

            // compile the scheme and LESS string
            $cssString = $compiler->compile($scheme.$less);

            // Write to {filename}.css
            File::put($this->getAssetPath("stylesheets/css/{$filename}.css"), $cssString);
        }
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
