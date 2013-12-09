<?php

use Fourum\Validation\Validators\TitleValidator;
use Mockery as m;

class TitleValidatorTest extends TestCase
{
    protected $title;

    public function setUp()
    {
        parent::setUp();

        $this->title = new TitleValidator();
    }

    public function testGetName()
    {
        $this->assertEquals('title', $this->title->getName());
    }

    public function testValidateEmpty()
    {
        $this->assertFalse($this->title->validate(''));
    }

    public function testValidateNotEmpty()
    {
        $this->assertTrue($this->title->validate('title'));
    }
}
