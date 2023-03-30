<?php

namespace App\Entities;

use App\Contracts\Receivable;
use App\Contracts\Sendable;
use App\Enums\MessageType;

class Student extends User implements Sendable, Receivable
{
    public function getFullName(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }

    public function allowedReceiverTypes(): array
    {
        return [Teacher::class];
    }

    public function allowedSendMessageTypes(): array
    {
        return [MessageType::MANUAL];
    }

    public function allowedReceiveMessageTypes(): array
    {
        return [MessageType::MANUAL, MessageType::SYSTEM];
    }
}
