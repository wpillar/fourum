<?php namespace Fourum\Theme;

use lessc;
use File;

/**
 * Theme Compiler
 *
 * Class for handling the compiling of a Theme.
 */
class Compiler
{
    /**
     * The theme we're compiling.
     *
     * @var Theme
     */
    private $theme;

    /**
     * Files that are excluded from the compile.
     *
     * @var array
     */
    private $excludes;

    /**
     * Construct the Compiler.
     *
     * @param Theme $theme
     * @param array $excludes
     */
    public function __construct(Theme $theme, array $excludes)
    {
        $this->theme = $theme;
        $this->excludes = $excludes;
    }

    /**
     * Compile the theme.
     *
     * @return void
     */
    public function compile()
    {
        $this->compileCss();
    }

    /**
     * Compile CSS for the theme.
     *
     * @return void
     */
    public function compileCss()
    {
        $this->compileCssFromBuildFile();
    }

    /**
     * Compile CSS from a build.json file.
     *
     * @return void
     */
    public function compileCssFromBuildFile()
    {
        $build = $this->parseBuildFile();

        $compiler = new lessc;
        $compiler->setFormatter('compressed');

        // handle bootstrap import paths
        $compiler->setImportDir(array(
            $this->theme->getLessDir().'/bootstrap'
        ));

        // compile each CSS file
        foreach ($build as $cssFile => $lessFiles) {
            // handle ignoring bootstrap
            if (in_array($cssFile, $this->excludes)) {
                continue;
            }

            $lessString = '';

            foreach ($lessFiles as $lessFile) {
                $lessString .= File::get($this->theme->getStylesheetsDir().'/'.$lessFile);
            }

            $cssString = $compiler->compile($lessString);

            File::put($this->theme->getStylesheetsDir().'/'.$cssFile, $cssString);
        }
    }

    /**
     * Get the contents of the build.json file.
     *
     * @return string
     */
    private function getBuildFile()
    {
        if (! File::exists($this->theme->getStylesheetsDir().'/build.json')) {
            throw new \Exception("Cannot find build.json for {$this->theme->getTheme()} theme.");
        }

        return File::get($this->theme->getStylesheetsDir().'/build.json');
    }

    /**
     * Parse the build.json file.
     *
     * @return array
     */
    private function parseBuildFile()
    {
        $file = $this->getBuildFile();

        // replace special strings
        $file = str_replace("{scheme}", $this->theme->getColourScheme(), $file);

        $build = json_decode($file);

        return $build;
    }
}
