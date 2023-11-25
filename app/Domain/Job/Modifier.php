<?php declare(strict_types=1);

namespace App\Domain\Job;

use Predis\Response\ServerException;

class Modifier
{
    public function __construct(
        readonly private Mutator $mutator,
    ) {
    }

    /**
     * @throws ServerException
     */
    public function create(array $data): string
    {
        $jobId = uniqid();
        $key = sprintf('job:%s', $jobId);
        $this->mutator->create($data, ['jobId' => $jobId, 'key' => $key]);

        return $jobId;
    }
}
