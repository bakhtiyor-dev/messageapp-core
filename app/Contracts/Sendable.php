<?php

namespace App\Contracts;

interface Sendable
{
    public function allowedReceiverTypes(): array;

    public function allowedMessageTypes(): array;
}
