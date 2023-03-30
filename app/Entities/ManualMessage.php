<?php

namespace App\Models;

use App\Enums\MessageType;

class ManualMessage extends Message
{
    public function __construct()
    {
        $this->messageType = MessageType::MANUAL;
    }
}
