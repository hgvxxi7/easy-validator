<?php

namespace EasyValidator;


use EasyValidator\Validator\IntValidator;
use EasyValidator\Validator\LengthValidator;
use EasyValidator\Validator\StringValidator;
use EasyValidator\Validator\ValidatorInterface;

class Validator
{
    private $factoryMap = [
        'string' => StringValidator::class,
        'number' => IntValidator::class,
        'length' => LengthValidator::class
    ];

    private $value;

    private $messages = [];

    private $valid;

    public function getMessages()
    {
        return $this->messages;
    }

    public function getValid()
    {
        return $this->valid;
    }

    public static function validate($value)
    {
        $validator = new Validator();
        $validator->value = $value;
        return $validator;

    }

    public function __call($name, $params)
    {
        $className = $this->factoryMap[$name];
        /* @var $object ValidatorInterface */
        $object = new $className;
        $result = $object->validate($this->value, $params);
        return $result;
    }
}