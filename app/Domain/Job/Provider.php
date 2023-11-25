<?php declare(strict_types=1);

namespace App\Domain\Job;

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

        return $this->hydrator->hydrateFromStringToJson($data);
    }
}
