<?php

namespace Core;

use App\Exceptions\ValidationException;

class Validator
{
    /**
     * @throws ValidationException
     */
    public function validateEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new ValidationException('Invalid email provided!');
        }
    }

    public function validateRequired($field): void
    {
        if (empty($field)) {
            throw new ValidationException('required fields are empty!');
        }
    }

    /**
     * @throws ValidationException
     */
    public function validateFileExtension(string $filename, string $extension): void
    {
        if (!preg_match("/\.({$extension})$/", $filename)) {
            throw new ValidationException('Invalid file provided!');
        }
    }

}
