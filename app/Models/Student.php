<?php

namespace App\Models;

use Core\Model;

class Student extends User
{
    public function getFullName(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }
}
