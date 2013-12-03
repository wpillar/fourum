<?php

use Fourum\Storage\Setting\Manager;
use Mockery as m;

class ManagerTest extends TestCase
{
	private $db;

	private $file;

	public function setUp()
	{
		parent::setUp();

		$this->db = m::mock('Fourum\Storage\Setting\EloquentSettingRepository');
		$this->file = m::mock('Fourum\Storage\Setting\FileSettingRepository');
	}

	public function testGetDb()
	{
		$setting = m::mock('Fourum\Models\Setting');
		$this->db->shouldReceive('get')->once()->with('general.name')->andReturn($setting);

		$manager = new Manager($this->db, $this->file);

		$this->assertInstanceOf('Fourum\Models\Setting', $manager->get('general.name'));
	}

	public function testGetFile()
	{
		$this->db->shouldReceive('get')->once()->with('general.name')->andReturn(null);
		$this->file->shouldReceive('get')->once()->with('general.name')->andReturn('string');

		$manager = new Manager($this->db, $this->file);

		$this->assertInternalType('string', $manager->get('general.name'));
	}

	public function testGetByNamespaceArray()
	{
		$this->db->shouldReceive('getByNamespace')->once()->with('general')->andReturn(array('name'));
		$this->file->shouldReceive('getByNamespace')->once()->with('general')->andReturn(array('name'));

		$manager = new Manager($this->db, $this->file);

		$this->assertInternalType('array', $manager->getByNamespace('general'));
	}

	public function testGetByNamespaceCountOne()
	{
		$this->db->shouldReceive('getByNamespace')->once()->with('general')->andReturn(array('name' => 'foo'));
		$this->file->shouldReceive('getByNamespace')->once()->with('general')->andReturn(array('name' => 'bar'));

		$manager = new Manager($this->db, $this->file);

		$this->assertCount(1, $manager->getByNamespace('general'));
	}

	public function testGetByNamespaceCountTwo()
	{
		$this->db->shouldReceive('getByNamespace')->once()->with('general')->andReturn(array('name' => 'foo'));
		$this->file->shouldReceive('getByNamespace')->once()->with('general')->andReturn(array('bar' => 'baz'));

		$manager = new Manager($this->db, $this->file);

		$this->assertCount(2, $manager->getByNamespace('general'));
	}

	public function testGetByNamespaceDbOverFile()
	{
		$this->db->shouldReceive('getByNamespace')->once()->with('general')->andReturn(array('name' => 'foo'));
		$this->file->shouldReceive('getByNamespace')->once()->with('general')->andReturn(array('name' => 'bar'));

		$manager = new Manager($this->db, $this->file);

		$namespace = $manager->getByNamespace('general');

		$this->assertEquals('foo', $namespace['name']);
	}

	public function testGetByNamespaceAndNameDb()
	{
		$setting = m::mock('Fourum\Models\Setting');
		$this->db->shouldReceive('getByNamespaceAndName')->once()->with('general', 'name')->andReturn($setting);

		$manager = new Manager($this->db, $this->file);

		$this->assertInstanceOf('Fourum\Models\Setting', $manager->getByNamespaceAndName('general', 'name'));
	}

	public function testGetByNamespaceAndNameFile()
	{
		$this->db->shouldReceive('getByNamespaceAndName')->once()->with('general', 'name')->andReturn(null);
		$this->file->shouldReceive('getByNamespaceAndName')->once()->with('general', 'name')->andReturn('string');

		$manager = new Manager($this->db, $this->file);

		$this->assertInternalType('string', $manager->getByNamespaceAndName('general', 'name'));
	}

	public function testGetByNamespaceAndNameNull()
	{
		$this->db->shouldReceive('getByNamespaceAndName')->once()->with('general', 'name')->andReturn(null);
		$this->file->shouldReceive('getByNamespaceAndName')->once()->with('general', 'name')->andReturn(null);

		$manager = new Manager($this->db, $this->file);

		$this->assertNull($manager->getByNamespaceAndName('general', 'name'));
	}

	public function testSetDb()
	{
		$setting = m::mock('Fourum\Models\Setting');
		$setting->shouldReceive('setAttribute')->once();
		$setting->shouldReceive('save')->once()->withNoArgs();

		$this->db->shouldReceive('getByNamespaceAndName')->once()->with('general', 'name')->andReturn($setting);

		$manager = new Manager($this->db, $this->file);

		$this->assertInstanceOf('Fourum\Models\Setting', $manager->set('general', 'name', 'foo'));
	}

	public function testSetFile()
	{
		$setting = m::mock('Fourum\Models\Setting');

		$this->db->shouldReceive('getByNamespaceAndName')->once()->with('general', 'name')->andReturn(null);
		$this->db->shouldReceive('create')->once()->andReturn($setting);

		$this->file->shouldReceive('getByNamespaceAndName')
			->once()
			->with('general', 'name')
			->andReturn(array(
				'value' => 'foo',
				'title' => 'Forum Name',
				'description' => 'Name of forum',
				'options' => null
			));

		$manager = new Manager($this->db, $this->file);
		$setting = $manager->set('general', 'name', 'bar');

		$this->assertInstanceOf('Fourum\Models\Setting', $setting);
	}
}
