<?php

use Mockery as m;
use Fourum\Validation\ValidatorRegistry;

class ValidatorRegistryTest extends TestCase
{
    public function testConstruct()
    {
        $validators = array(
            'foo' => m::mock('Fourum\Validation\ValidatorInterface'),
            'bar' => m::mock('Fourum\Validation\ValidatorInterface'),
            'baz' => m::mock('Fourum\Validation\ValidatorInterface')
        );

        $registry = new ValidatorRegistry($validators);

        $this->assertInstanceOf('Fourum\Validation\ValidatorInterface', $registry->get('foo'));
        $this->assertInstanceOf('Fourum\Validation\ValidatorInterface', $registry->get('bar'));
        $this->assertInstanceOf('Fourum\Validation\ValidatorInterface', $registry->get('baz'));
    }

    public function testAdd()
    {
        $registry = new ValidatorRegistry();

        $validator = m::mock('Fourum\Validation\ValidatorInterface');
        $validator->shouldReceive('getName')
            ->withNoArgs()
            ->once()
            ->andReturn('foo');

        $registry->add($validator);

        $this->assertInstanceOf('Fourum\Validation\ValidatorInterface', $registry->get('foo'));
    }
}
