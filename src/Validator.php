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
        $result = $object->validate($this->value);
        return $result;
    }

    public function string()
    {
        if ( is_string($this->value))
        {
            $this->valid = true;
        } else {
            $this->messages[]='value is not string';
            $this->valid = false;
        }
        return $this;
    }

    public function length($min, $max)
    {
        $length = strlen($this->value);
        if ($length >= $min && $length <= $max)
        {
            $this->valid = true;
        } else {
            $this->messages[]='invalid min or max';
            $this->valid = false;
        }
        return $this;
    }
}