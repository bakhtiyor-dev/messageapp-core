<?php

namespace App\Entities;

use App\Contracts\Receivable;
use App\Contracts\Sendable;
use App\Enums\MessageType;

//Parent is reserved keyword
class ParentGuardian extends User implements Sendable, Receivable
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
        return [Teacher::class];
    }

    public function allowedSendMessageTypes(): array
    {
        return [MessageType::MANUAL];
    }

    public function allowedReceiveMessageTypes(): array
    {
        return [MessageType::MANUAL];
    }
}
