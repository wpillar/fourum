<?php

use Mockery as m;
use Fourum\Theme\Theme;

class ThemeTest extends TestCase
{
    private $theme;

    public function setUp()
    {
        $fileViewFinder = m::mock('Fourum\View\FileViewFinder');
        $fileViewFinder->shouldReceive('setPaths')->once();

        $fileSystem = m::mock('Illuminate\Filesystem\Filesystem');
        $fileSystem->shouldReceive('files')->once()->andReturn(array());
        $fileSystem->shouldReceive('files')->once()->andReturn(array());

        $this->theme = new Theme($fileViewFinder, $fileSystem);
        $this->theme->setApplication('admin');
    }

    public function testGetSetTheme()
    {
        $this->assertEquals('default', $this->theme->getTheme());

        $this->theme->setTheme('test');

        $this->assertEquals('test', $this->theme->getTheme());
    }

    public function testGetSetApplication()
    {
        $this->assertEquals('admin', $this->theme->getApplication());

        $this->theme->setApplication('front');

        $this->assertEquals('front', $this->theme->getApplication());
    }

    public function testApplicationException()
    {
        $this->setExpectedException('Fourum\Theme\ApplicationNotSetException');

        $this->theme->setApplication(null);
        $this->theme->setApplication('admin');
    }

    public function testGetSetColourScheme()
    {
        $this->assertEquals('default', $this->theme->getColourScheme());

        $this->theme->setColourScheme('test');

        $this->assertEquals('test', $this->theme->getColourScheme());
    }

    public function testGetAssetPath()
    {
        $assetPath = $this->theme->getAssetPath('image');

        $this->assertTrue(strpos($assetPath, 'image') !== FALSE);
    }

    public function testGetCssDir()
    {
        $this->assertInternalType('string', $this->theme->getCssDir());
    }

    public function testGetStylesheets()
    {
        $this->assertInternalType('array', $this->theme->getStylesheets('less'));
        $this->assertInternalType('array', $this->theme->getStylesheets());
    }

    public function testJs()
    {
        $this->assertInternalType('string', $this->theme->js('test'));
    }

    public function testCss()
    {
        $this->assertInternalType('string', $this->theme->css('test'));
    }
}
