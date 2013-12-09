<?php

use Fourum\Validation\Validators\EmailValidator;
use Mockery as m;

class EmailValidatorTest extends TestCase
{
    protected $email;

    protected $builder;

    protected $connection;

    public function setUp()
    {
        parent::setUp();

        $this->email = new EmailValidator();
        $this->builder = m::mock('Illuminate\Database\Query\Builder');
        $this->connection = m::mock('Illuminate\Database\Connection');

        $this->connection = m::mock('Illuminate\Database\Connection');
        $this->connection->shouldReceive('table')
            ->with('users')
            ->andReturn($this->builder);

        $this->builder->shouldReceive('where')
            ->andReturn($this->builder);
        $this->builder->shouldReceive('count')
            ->withNoArgs()
            ->andReturn(0);

        App::instance('db', $this->connection);
    }

    public function testGetName()
    {
        $this->assertEquals('email', $this->email->getName());
    }

    public function testValidateNormalEmail()
    {
        $this->assertTrue($this->email->validate('me@willpillar.com'));
    }

    public function testValidateUkEmail()
    {
        $this->assertTrue($this->email->validate('123@test.co.uk'));
    }

    public function testValidateUniEmail()
    {
        $this->assertTrue($this->email->validate('123@test.ac.uk'));
    }

    public function testValidateStrangeCharEmail()
    {
        $this->assertTrue($this->email->validate('$%.&^@test.com'));
    }

    public function testValidateInvalidEmail()
    {
        $this->assertFalse($this->email->validate('123@@test.com.uk.net'));
    }

    public function testGetMessage()
    {
        $this->email->validate('123@@test.com');

        $this->assertInternalType('string', $this->email->getMessage());
    }
}
