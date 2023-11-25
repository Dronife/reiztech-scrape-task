<?php declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class UnableToUpdateException extends Exception
{
    public function __construct(string $message = "Unable to update job", int $code = 400)
    {
        parent::__construct($message, $code);
    }
}
