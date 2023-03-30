<?php

namespace App\Models;

use Core\Model;

abstract class User extends Model
{
    protected int $userId;

    protected string $firstName;

    protected string $lastName;

    protected string $email;

    protected ?string $avatar;

    public abstract function getFullName(): string;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}
