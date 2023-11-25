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
     * @throws \JsonException
     */
    public function create(array $data): string
    {
        $jobId = uniqid();
        $key = "job:$jobId";
        $this->mutator->create($data, ['jobId' => $jobId, 'key' => $key]);

        return $jobId;
    }

    public function delete(string $id): bool
    {
        $key = "job:$id";

        return $this->mutator->delete($key);
    }
}
