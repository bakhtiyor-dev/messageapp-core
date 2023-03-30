<?php

namespace App\Models;

use App\Contracts\Sendable;
use App\Enums\MessageType;

class ParentGuardian extends User implements Sendable
{
    protected ?string $salutation;

    public function setSalutation(string $salutation)
    {
        $this->salutation = $salutation;
    }

    public function getFullName(): string
    {
        return "{$this->salutaion} {$this->firstName} {$this->lastName}";
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
