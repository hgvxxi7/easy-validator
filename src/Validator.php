<?php

namespace EasyValidator;


use EasyValidator\Validator\AbstractValidator;
use EasyValidator\Validator\IntValidator;
use EasyValidator\Validator\LengthValidator;
use EasyValidator\Validator\StringValidator;
use EasyValidator\Validator\ValidatorInterface;

/**
 * 1
 * @package EasyValidator
 */
class Validator
{
    private $factoryMap = [
        'string' => StringValidator::class,
        'number' => IntValidator::class, //::class возьми имя класса
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

    /**
     * 2
     * @param $value
     * @return Validator
     */
    public static function validate($value)
    {
        $validator = new Validator();
        $validator->value = $value;
        return $validator;

    }

    /**
     * 3
     * @param $name
     * @param $params
     * @return mixed
     */
    public function __call($name, $params)
    {
        $className = $this->factoryMap[$name];
        /* @var $object ValidatorInterface|AbstractValidator */
        $object = new $className;
        $result = $object->validate($this->value, $params);
        $messages = $object->getMessages();
        if (isset($messages[0])) {
            $this->messages[] = $messages[0];
        }
        return $this;
    }
}