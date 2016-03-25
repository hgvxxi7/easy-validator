<?php

namespace EasyValidator\Validator;


class IntValidator extends AbstractValidator implements ValidatorInterface
{
    public function validate($value)
    {
        if (is_numeric($value))
        {
            return true;
        } else {
            $this->addMessage('The value is\'t number.');
            return false;
        }
    }

}