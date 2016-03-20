<?php

namespace EasyValidator;


class Validator
{
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

    public function number()
    {
        if (is_numeric($this->value))
        {
            $this->valid = true;
        } else {
            $this->messages[]='The value is\'t number.';
            $this->valid = false;
        }
        return $this;
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