<?php namespace Fourum\View;

use Illuminate\View\FileViewFinder as IlluminateFileViewFinder;

/**
 * File View Finder - extends \Illuminate\View\FileViewFinder
 */
class FileViewFinder extends IlluminateFileViewFinder
{
    /**
     * Method for overriding the $this->paths on
     * \Illuminate\View\FileViewFinder
     *
     * This is so Theme can inject the correct view
     * path on the fly.
     *
     * @param string $path
     */
    public function setPaths(array $paths)
    {
        $this->paths = $paths;
    }
}
