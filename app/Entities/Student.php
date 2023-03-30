<?php

namespace App\Models;

use App\Contracts\Sendable;
use App\Enums\MessageType;

class Student extends User implements Sendable
{
    public function getFullName(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }

    public function allowedReceiverTypes(): array
    {
        return [Teacher::class];
    }

    public function allowedMessageTypes(): array
    {
        return [MessageType::MANUAL];
    }
}
