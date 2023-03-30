<?php

namespace App\Entities;

use App\Enums\MessageType;

class SystemMessage extends Message
{
    public function __construct(string $message)
    {
        $this->message = $message;
        $this->messageType = MessageType::SYSTEM;
    }
}
