<?php declare(strict_types=1);

namespace App\Repositories;

use App\Providers\RedisProvider;
use Predis\Response\ServerException;

class JobRepository
{
    public function __construct(
        readonly private RedisProvider $redisProvider
    ) {
    }

    public function createJob(string $keyJob, string $job): void
    {
        try {
            $this->redisProvider->create($keyJob, $job);
        }catch(ServerException $exception){
            throw new ServerException('Something happened trying to write data');
        }
    }

    public function getJobById(string $key): string
    {
        return $this->redisProvider->getByKey($key);
    }
}
