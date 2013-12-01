<?php

namespace Fourum\Validation;

interface ValidatorInterface
{
    public function validate($value);

    public function getMessage();

    public function getName();
}
