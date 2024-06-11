<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class InvalidSystemException extends Exception
{
    public function __construct(string $message = "Invalid system", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
