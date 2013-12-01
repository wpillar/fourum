<?php

use Mockery as m;
use Fourum\Theme\Compiler;

class CompilerTest extends TestCase
{
	private $theme;

	private $filesystem;

	public function setUp()
	{
		parent::setUp();

		$theme = m::mock('Fourum\Theme\Theme');
		$theme->shouldReceive('getStylesheetsDir')->once()->withNoArgs()->andReturn('stylesheets');
		$theme->shouldReceive('getColourScheme')->once()->withNoArgs()->andReturn('default');
		$theme->shouldReceive('getLessDir')->once()->withNoArgs()->andReturn('stylesheets/less');
		$theme->shouldReceive('getTheme')->once()->withNoArgs()->andReturn('default');

		$filesystem = m::mock('Illuminate\Filesystem\Filesystem');
		$filesystem->shouldReceive('exists')->once()->with('stylesheets/build.json')->andReturn(true);
		$filesystem->shouldReceive('get')->once()->with('stylesheets/build.json')->andReturn('{}');

		$this->theme = $theme;
		$this->filesystem = $filesystem;
	}

	public function testCompileException()
	{
		$this->setExpectedException('Fourum\Theme\BuildFileNotFoundException');

		$filesystem = m::mock('Illuminate\Filesystem\Filesystem');
		$filesystem->shouldReceive('exists')->once()->with('stylesheets/build.json')->andReturn(false);
		$filesystem->shouldReceive('get')->once()->with('stylesheets/build.json')->andReturn('{}');

		$compiler = new Compiler($this->theme, $filesystem);
		$compiler->compile();
	}
}
