<?php

namespace Tests;

use App\Entities\ParentGuardian;
use App\Entities\Student;
use App\Entities\Teacher;
use App\Exceptions\ValidationException;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserHasFullName()
    {
        $user = new Student();
        $user->setFirstName('John');
        $user->setLastName('Doe');
        $this->assertEquals('John Doe', $user->getFullName());

        $user = new Teacher();
        $user->setFirstName('John');
        $user->setLastName('Doe');
        $user->setSalutation('MR');
        $this->assertEquals('MR John Doe', $user->getFullName());
    }

    public function testUserHasDefaultAvatar()
    {
        $user = new Student();
        $this->assertEquals('path_to_default_system_avatar', $user->getAvatar());
    }

    public function testUserHasEmail()
    {
        $user = new Student();
        $user->setEmail('test@mail.com');
        $this->assertEquals('test@mail.com', $user->getEmail());
    }

    public function testUserCanBeSaved()
    {
        $user = new ParentGuardian();

        $user->setFirstName('John');
        $user->setLastName('Doe');
        $user->setEmail('test@test.com');
        $user->setAvatar('file.jpg');
        $this->assertTrue($user->save());
    }

    public function testUserHasValidationWhileSaving()
    {

        $this->expectException(ValidationException::class);
        $user = new ParentGuardian();
        $user->setFirstName('john');
        $user->setLastName('doe');
        $user->setEmail('testtest.com');
        $user->setAvatar("path");
        $user->save();
    }
}
