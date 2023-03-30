<?php

namespace Tests;

use App\Entities\ManualMessage;
use App\Entities\ParentGuardian;
use App\Entities\Student;
use App\Entities\SystemMessage;
use App\Entities\Teacher;
use App\Exceptions\InvalidReceiverException;
use PHPUnit\Framework\TestCase;

class TeacherTest extends TestCase
{
    public function testTeacherCanSendMessageToStudent()
    {
        $message = new ManualMessage('new message');
        $message->setSender(new Teacher());
        $message->setReceiver(new Student());
        $result = $message->save();
        $this->assertTrue($result);
    }

    public function testTeacherCanSendMessageToParent()
    {
        $message = new ManualMessage('new message');
        $message->setSender(new Teacher());
        $message->setReceiver(new ParentGuardian());
        $result = $message->save();
        $this->assertTrue($result);
    }

    public function testTeacherCanSendSystemMessageToStudent()
    {
        $message = new SystemMessage('new message');
        $message->setSender(new Teacher());
        $message->setReceiver(new Student());
        $result = $message->save();
        $this->assertTrue($result);
    }

    public function testTeacherCannotSendSystemMessageToParent()
    {
        $this->expectException(InvalidReceiverException::class);
        $message = new SystemMessage('new message');
        $message->setSender(new Teacher());
        $message->setReceiver(new ParentGuardian());
        $message->save();
    }

    public function testTeacherCannotSendSystemMessageToTeacher()
    {
        $this->expectException(InvalidReceiverException::class);
        $message = new SystemMessage('new message');
        $message->setSender(new Teacher());
        $message->setReceiver(new Teacher());
        $message->save();
    }
}
