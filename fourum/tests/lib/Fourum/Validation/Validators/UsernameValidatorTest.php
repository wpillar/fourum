<?php

use Fourum\Validation\Validators\UsernameValidator;
use Mockery as m;

class UsernameValidatorTest extends TestCase
{
    protected $username;

    protected $builder;

    protected $connection;

    public function setUp()
    {
        parent::setUp();

        $this->username = new UsernameValidator();
        $this->builder = m::mock('Illuminate\Database\Query\Builder');
        $this->connection = m::mock('Illuminate\Database\Connection');

        $this->connection = m::mock('Illuminate\Database\Connection');
        $this->connection->shouldReceive('table')
            ->with('users')
            ->andReturn($this->builder);
    }

    public function testGetName()
    {
        $this->assertEquals('username', $this->username->getName());
    }

    public function testValidateNormal()
    {
        $this->builder->shouldReceive('where')
            ->with('username', '=', 'Nitrus')
            ->andReturn($this->builder);
        $this->builder->shouldReceive('count')
            ->withNoArgs()
            ->andReturn(0);

        App::instance('db', $this->connection);

        $this->assertTrue($this->username->validate('Nitrus'));
    }
}
