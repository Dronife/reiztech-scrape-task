<?php declare(strict_types=1);

namespace App\Services\Job;

use App\Domain\Job\Provider;
use App\Exceptions\JobNotFoundException;

class JobProviderService
{
    public function __construct(readonly private Provider $provider)
    {
    }

    /**
     * @throws JobNotFoundException
     */
    public function getJobByIdAsJson(string $id): \stdClass
    {
        return $this->provider->getJobByIdAsJson($id);
    }
}
