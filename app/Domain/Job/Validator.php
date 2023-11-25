<?php

namespace App\Domain\Job;

use App\Exceptions\JobNotFoundException;

class Validator
{
    public function __construct(private readonly Provider $provider)
    {
    }

    public function jobExists(string $jobId): bool
    {
        try{
            return $this->provider->getJobByIdAsJson($jobId) !== null;
        }catch (JobNotFoundException){
            return false;
        }
    }
}
