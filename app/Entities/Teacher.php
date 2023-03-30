<?php

namespace App\Entities;

use App\Contracts\Receivable;
use App\Contracts\Sendable;
use App\Enums\MessageType;

class Teacher extends User implements Sendable, Receivable
{
    protected ?string $salutation;

    public function setSalutation(string $salutation)
    {
        $this->salutation = $salutation;
    }

    public function getFullName(): string
    {
        return "{$this->salutation} {$this->firstName} {$this->lastName}";
    }

    public function allowedReceiverTypes(): array
    {
        return [ParentGuardian::class, Student::class, Teacher::class];
    }

    public function allowedSendMessageTypes(): array
    {
        return [MessageType::MANUAL, MessageType::SYSTEM];
    }

    public function allowedReceiveMessageTypes(): array
    {
        return [MessageType::MANUAL];
    }
}
