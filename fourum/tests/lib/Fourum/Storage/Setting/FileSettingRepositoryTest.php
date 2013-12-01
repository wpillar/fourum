<?php

use Mockery as m;
use Fourum\Storage\Setting\FileSettingRepository;

class FileSettingRepositoryTest extends TestCase
{
	private $file;

	private $parser;

	public function setUp()
	{
		parent::setUp();

		$this->file = m::mock('Illuminate\Filesystem\Filesystem');
		$this->parser = m::mock('Symfony\Component\Yaml\Parser');
	}

	public function testAll()
	{
		$this->file->shouldReceive('files')->once()->andReturn(array('path/to/a/namespace.yml'));
		$this->file->shouldReceive('get')->once()->andReturn('string');
		$this->parser->shouldReceive('parse')->once()->andReturn(array(
			'name' => array(
				'title' => 'Forum Name',
				'description' => 'Name of the forum',
				'value' => 'Fourum'
			)
		));

		$repository = new FileSettingRepository($this->file, $this->parser);
		$settings = $repository->all();

		$this->assertInternalType('array', $settings);
		$this->assertTrue(array_key_exists('namespace', $settings));
	}

	public function testGet()
	{
		$this->file->shouldReceive('files')->once()->andReturn(array('path/to/a/general.yml'));
		$this->file->shouldReceive('get')->once()->andReturn('string');
		$this->parser->shouldReceive('parse')->once()->andReturn(array(
			'name' => array(
				'title' => 'Forum Name',
				'description' => 'Name of the forum',
				'value' => 'Fourum'
			)
		));

		$repository = new FileSettingRepository($this->file, $this->parser);
		$value = $repository->get('general.name');
		$null = $repository->get('general.foo');

		$this->assertEquals('Fourum', $value);
		$this->assertNull($null);
	}

	public function testGetByNamespaceAndName()
	{
		$this->file->shouldReceive('files')->once()->andReturn(array('path/to/a/general.yml'));
		$this->file->shouldReceive('get')->once()->andReturn('string');
		$this->parser->shouldReceive('parse')->once()->andReturn(array(
			'name' => array(
				'title' => 'Forum Name',
				'description' => 'Name of the forum',
				'value' => 'Fourum'
			)
		));

		$repository = new FileSettingRepository($this->file, $this->parser);
		$value = $repository->getByNamespaceAndName('general', 'foo');

		$this->assertNull($value);
	}
}
