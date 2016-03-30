<?php

namespace EasyValidator\Validator;


class AbstractValidator
{
    protected $messages = [];

    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param array $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    public function addMessage($message)
    {
        $this->messages[] = $message;
    }

}