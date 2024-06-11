<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class DataSourceException extends Exception
{
    public function __construct(string $message = "Failed to fetch data.", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
