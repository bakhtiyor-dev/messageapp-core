<?php

namespace App\Enums;

enum MessageType: string
{
    case SYSTEM = 'system';
    case MANUAL = 'manual';
}
