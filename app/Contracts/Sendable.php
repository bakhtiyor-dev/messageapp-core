<?php

namespace App\Contracts;

interface Sendable
{

    public function allowedSendMessageTypes(): array;
}
