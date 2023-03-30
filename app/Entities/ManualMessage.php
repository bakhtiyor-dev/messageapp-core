<?php

namespace App\Entities;

use App\Enums\MessageType;

class ManualMessage extends Message
{
    public function __construct(string $message)
    {
        $this->message = $message;
        $this->messageType = MessageType::MANUAL;
    }
}
