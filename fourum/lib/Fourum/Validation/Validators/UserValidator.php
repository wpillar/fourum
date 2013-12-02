<?php

namespace Fourum\Validation\Validators;

use Fourum\Validation\ValidatorInterface;
use Fourum\Validation\ValidatorRegistry;
use Illuminate\Support\Contracts\MessageProviderInterface;
use Illuminate\Support\MessageBag;
use Respect\Validation\Validator;

class UserValidator implements ValidatorInterface, MessageProviderInterface
{
    /**
     * @var \Fourum\Validation\ValidatorRegistry
     */
    protected $validators;

    /**
     * @var array
     */
    protected $messages;

    /**
     * @param \Fourum\Validation\ValidatorRegistry $registry
     */
    public function __construct(ValidatorRegistry $registry)
    {
        $this->validators = $registry;
        $this->messages = array();
    }

    /**
     * @param array $value
     * @return boolean
     */
    public function validate($value)
    {
        foreach ($value as $validatorName => $value) {
            $validator = $this->getValidator($validatorName);

            if (! $validator->validate($value)) {
                $this->messages[$validator->getName()] = $validator->getMessage();
            }
        }

        return count($this->messages) === 0;
    }

    /**
     * @return array
     */
    public function getMessage()
    {
        return $this->messages;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }

    /**
     * @return \Illuminate\Support\MessageBag
     */
    public function getMessageBag()
    {
        return new MessageBag($this->messages);
    }

    /**
     * @param string $name
     * @return \Fourum\Validation\ValidatorInterface
     */
    protected function getValidator($name)
    {
        $validator = $this->validators->get($name);

        if (! $validator) {
            throw new \Exception("No validator found for '$name'");
        }

        return $validator;
    }
}
