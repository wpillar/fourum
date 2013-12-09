<?php

use Fourum\Validation\Validators\PasswordValidator;
use Mockery as m;

class PasswordValidatorTest extends TestCase
{
    protected $password;

    public function setUp()
    {
        parent::setUp();

        $this->password = new PasswordValidator();
    }

    public function testGetName()
    {
        $this->assertEquals('password', $this->password->getName());
    }

    public function testValidateString()
    {
        $this->assertTrue($this->password->validate('password'));
    }

    public function testValidateEmptyString()
    {
        $this->assertFalse($this->password->validate(''));
    }

    public function testValidateInteger()
    {
        $this->assertFalse($this->password->validate(1234));
    }

    public function testValidateStrangeCharString()
    {
        $this->assertTrue($this->password->validate('@£$%^&*('));
    }

    public function testValidateShortString()
    {
        $this->assertFalse($this->password->validate('short'));
    }

    public function testValidateLongString()
    {
        $this->assertTrue($this->password->validate('qazwsxedcrfvtgbyhnujmikolpplmoknijbuhvygctfxrdzeswaq'));
    }

    public function testGetMessage()
    {
        $this->password->validate('');

        $this->assertInternalType('string', $this->password->getMessage());
    }
}
