<?php

namespace Tests;

use App\Entities\ManualMessage;
use App\Entities\ParentGuardian;
use App\Entities\Student;
use App\Entities\Teacher;
use App\Exceptions\InvalidSenderException;
use PHPUnit\Framework\TestCase;

class ParentTest extends TestCase
{
    public function testParentCannotSendMessageToStudent(): void
    {
        $this->expectException(InvalidSenderException::class);

        $message = new ManualMessage('new message');
        $message->setSender(new ParentGuardian());
        $message->setReceiver(new Student());
        $message->save();
    }

    public function testParentCannotSendMessageToParent(): void
    {
        $this->expectException(InvalidSenderException::class);

        $message = new ManualMessage('new message');
        $message->setSender(new ParentGuardian());
        $message->setReceiver(new ParentGuardian());
        $message->save();
    }

    public function testParentCanSendMessageToTeacher()
    {
        $message = new ManualMessage('new message');
        $message->setSender(new ParentGuardian());
        $message->setReceiver(new Teacher());
        $result = $message->save();

        $this->assertTrue($result);
    }
}
