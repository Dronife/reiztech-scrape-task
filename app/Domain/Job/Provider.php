<?php declare(strict_types=1);

namespace App\Domain\Job;

use App\Exceptions\JobNotFoundException;
use App\ModelsDto\Job;
use App\Repositories\JobRepository;

class Provider
{
    public function __construct(
        readonly private JobRepository $jobRepository,
        readonly private Hydrator $hydrator,
    ) {
    }

    public function getJobByIdAsJson(string $id): \stdClass
    {
        $data = $this->jobRepository->getJobById("job:$id");

        if ($data === null) {
            throw new JobNotFoundException("Job with an id $id was not found.");
        }

        return $this->hydrator->hydrateFromStringToJson($data);
    }
}
