<?php

namespace App\Contracts;

interface Receivable
{
    public function allowedReceiverTypes(): array;

    public function allowedReceiveMessageTypes(): array;
}
