<?php declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class JobNotFoundException extends Exception
{
    // You can provide a default message and a default code if you like
    public function __construct(string $message = "Job not found.", int $code = 404)
    {
        parent::__construct($message, $code);
    }
}
