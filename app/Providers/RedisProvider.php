<?php declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\Redis;

class RedisProvider
{
    private string $redisPrefix;

    public function __construct()
    {
        $this->redisPrefix = env('REDIS_PREFIX');
    }

    public function create(string $key, string $data)
    {
        Redis::set($key, $data);
    }

    public function getByKey($key): ?string
    {
        return Redis::get($key);
    }

    public function deleteByKey($key): bool
    {
        return (bool) Redis::del($key);
    }
}
