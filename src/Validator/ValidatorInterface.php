<?php

namespace EasyValidator\Validator;


interface ValidatorInterface
{
    public function validate($value, $params);
}