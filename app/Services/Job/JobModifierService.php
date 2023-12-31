<?php declare(strict_types=1);

namespace App\Services\Job;

use App\Domain\Job\Modifier;
use App\Exceptions\UnableToUpdateException;
use Predis\Response\ServerException;

class JobModifierService
{
    public function __construct(readonly private Modifier $modifier)
    {
    }

    /**
     * @throws ServerException
     * @throws \JsonException
     */
    public function create(array $data): string
    {
        return $this->modifier->create($data);
    }

    public function delete(string $id): bool
    {
       return $this->modifier->delete($id);
    }

    /**
     * @throws \JsonException
     * @throws ServerException
     * @throws UnableToUpdateException
     */
    public function update(array $data, array $context): void
    {
        $this->modifier->update($data, $context);
    }
}
