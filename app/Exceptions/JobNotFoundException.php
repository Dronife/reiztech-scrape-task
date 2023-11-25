<?php declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class JobNotFoundException extends Exception
{
    public function __construct(string $message = "Job not found.", int $code = 404)
    {
        parent::__construct($message, $code);
    }
}
