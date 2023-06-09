<?php

namespace App\Entities;

use App\Exceptions\ValidationException;
use Core\Model;
use Core\Validator;

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

    public function getAvatar(): string
    {
        return $this->avatar ?? $this->getDefaultAvatar();
    }

    protected function getDefaultAvatar(): string
    {
        return 'path_to_default_system_avatar';
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setAvatar(?string $avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * @throws ValidationException
     */
    public function save(): bool
    {
        $validator = new Validator();
        $validator->validateRequired($this->firstName);
        $validator->validateRequired($this->lastName);
        $validator->validateEmail($this->email);
        $validator->validateFileExtension($this->avatar, 'jpg');

        return true;
    }
}
