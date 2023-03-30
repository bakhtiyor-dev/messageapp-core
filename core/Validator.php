<?php

namespace Core;

use App\Exceptions\InvalidArgumentException;

class Validator
{
    /**
     * @throws InvalidArgumentException
     */
    public function validateEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email provided!');
        }
    }

    /**
     * @throws InvalidArgumentException
     */
    public function validateFileExtension(string $filename, string $extension): void
    {
        if (!preg_match("/\.({$extension})$/", $filename)) {
            throw new InvalidArgumentException('Invalid file provided!');
        }
    }

}
