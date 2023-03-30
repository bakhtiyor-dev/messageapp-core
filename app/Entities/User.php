<?php

namespace App\Models;

use App\Exceptions\InvalidArgumentException;
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
     * @throws InvalidArgumentException
     */
    public function save()
    {
        $validator = new Validator();

        $validator->validateEmail($this->email);
        $validator->validateFileExtension($this->avatar, 'jpg');

        echo "user saved successfully!";
    }
}
