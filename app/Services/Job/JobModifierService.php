<?php declare(strict_types=1);

namespace App\Services\Job;

use App\Domain\Job\Modifier;
use Predis\Response\ServerException;

class JobModifierService
{
    public function __construct(readonly private Modifier $modifier)
    {
    }

    /**
     * @throws ServerException
     */
    public function create(array $data): string
    {
        return $this->modifier->create($data);
    }
}
