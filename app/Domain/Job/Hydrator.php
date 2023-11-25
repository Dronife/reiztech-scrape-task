<?php declare(strict_types=1);

namespace App\Domain\Job;

use App\Enums\JobStatus;
use App\ModelsDto\Job;

class Hydrator
{
    public function hydrateFromArrayToModel(array $data): Job
    {
        if (!JobStatus::tryFrom($data['status'])) {
            throw new \InvalidArgumentException("Invalid status value");
        }

        return (new Job())
            ->setId($data['id'])
            ->setUrls($data['urls'])
            ->setSelectors($data['selectors'])
            ->setStatus(JobStatus::from($data['status']));
    }

    /**
     * @throws \JsonException
     */
    public function hydrateFromArrayToString(array $data)
    {
        try {
            return json_encode($data);
        }catch(\JsonException $exception){
            throw new \JsonException($exception->getMessage());
        }
    }

    public function hydrateFromStringToModel(string $data): Job
    {
        $dataAsArray = json_decode($data, true);

        return $this->hydrateFromArrayToModel($dataAsArray);
    }

    public function hydrateFromStringToJson(string $data): \stdClass
    {
        return json_decode($data);
    }
}
