<?php

namespace App\Models;

use App\Enums\MessageType;

class SystemMessage extends Message
{
    public function __construct()
    {
        $this->messageType = MessageType::SYSTEM;
    }
}
