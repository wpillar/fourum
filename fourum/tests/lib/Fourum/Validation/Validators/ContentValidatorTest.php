<?php

use Fourum\Validation\Validators\ContentValidator;
use Mockery as m;

class ContentValidatorTest extends TestCase
{
    public function testGetName()
    {
        $content = new ContentValidator();

        $this->assertEquals('content', $content->getName());
    }

    public function testValidateEmpty()
    {
        $content = new ContentValidator();

        $this->assertFalse($content->validate(''));
    }

    public function testValidateNotEmpty()
    {
        $content = new ContentValidator();

        $this->assertTrue($content->validate('foo'));
    }

    public function testGetMessage()
    {
        $content = new ContentValidator();
        $content->validate('');

        $this->assertInternalType('string', $content->getMessage());
    }
}
