<?php declare(strict_types=1);

namespace App\Domain\Job;

use App\Enums\JobStatus;
use App\Repositories\JobRepository;

class Mutator
{
    public function __construct(
        readonly private JobRepository $jobRepository,
        readonly private Hydrator $hydrator,
    ) {
    }

    public function create(array $data, array $context): void
    {
        $data['id'] = $context['jobId'];
        $data['status'] = JobStatus::PENDING->value;

        $jobDataAsString = $this->hydrator->hydrateFromArrayToString($data);

        $this->jobRepository->createJob($context['key'], $jobDataAsString);
    }
}
