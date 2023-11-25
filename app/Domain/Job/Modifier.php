<?php declare(strict_types=1);

namespace App\Domain\Job;

use App\Exceptions\UnableToUpdateException;
use Predis\Response\ServerException;

class Modifier
{
    public function __construct(
        readonly private Mutator $mutator,
        readonly private Validator $validator,
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

    /**
     * @throws ServerException
     * @throws \JsonException
     * @throws UnableToUpdateException
     */
    public function update(array $data, array $context): void
    {
        $context['key'] = sprintf('job:%s', $data['id']);

        if(!$this->validator->jobExists($data['id']))
        {
            throw new UnableToUpdateException(sprintf('Unable to update job with %s id', $data['id']));
        }

        $this->mutator->update($data, $context);
    }
}
