<?php


namespace EasyValidator\Validator;


class LengthValidator extends AbstractValidator implements ValidatorInterface
{
    public function validate($value, $params)
    {
        $length = strlen($value);
        if ($length >= $params[0] && $length <= $params[1])
        {
            return true;
        } else {
            $this->addMessage('Invalid min or max.');
            return false;
        }
    }

}