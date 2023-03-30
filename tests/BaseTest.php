<?php

namespace tests;

use App\Models\Student;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    public function testGreetsWithName(): void
    {
        $greeter = new Student();

        $greeting = $greeter->getFullName();

        $this->assertSame('Hello, Alice!', $greeting);
    }
}
