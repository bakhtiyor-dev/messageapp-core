<?php

namespace tests;

use App\Models\ManualMessage;
use App\Models\Student;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{

    public function testParentCanSendMessageOnlyToTeacher(): void
    {
        $message = new ManualMessage();
        $message->setMessage('new message');
        $message->setSender(new Student());

        $this->expectException();
    }
}
