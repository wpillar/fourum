<?php

namespace Fourum\Validation;

use Fourum\Validation\ValidatorInterface;

class ValidatorRegistry
{
    /**
     * @var array
     */
    protected $validators;

    /**
     * @param array $validators
     */
    public function __construct(array $validators = array())
    {
        $this->validators = $validators;
    }

    /**
     * @param \Fourum\Validation\ValidatorInterface $validator
     */
    public function add(ValidatorInterface $validator)
    {
        $this->validators[$validator->getName()] = $validator;
    }

    /**
     * @param string $name
     * @return \Fourum\Validation\ValidatorInterface
     */
    public function get($name)
    {
        return $this->validators[$name];
    }
}
