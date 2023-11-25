<?php declare(strict_types=1);

namespace App\Services\Job;

use App\Domain\Job\Provider;

class JobProviderService
{
    public function __construct(readonly private Provider $provider)
    {
    }

    public function getJobByIdAsJson(string $id): \stdClass
    {
        return $this->provider->getJobByIdAsJson($id);
    }
}
