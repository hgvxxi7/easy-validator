<?php

namespace EasyValidator\Validator;


class StringValidator extends AbstractValidator implements ValidatorInterface
{
    public function validate($value, $params)
    {
        if ( is_string($value))
        {
            return true;
        } else {
            $this->addMessage('The value is\'t string.');
            return false;
        }
    }
}