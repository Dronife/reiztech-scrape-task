<?php declare(strict_types=1);

namespace App\ModelsDto;

use App\Enums\JobStatus;

class Job
{
    private string $id;
    private JobStatus $status;
    /** @var list<string>  */
    private array $urls;
    /** @var list<string> */
    private array $selectors;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getStatus(): JobStatus
    {
        return $this->status;
    }

    public function setStatus(JobStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUrls(): array
    {
        return $this->urls;
    }

    public function setUrls(array $urls): self
    {
        $this->urls = $urls;

        return $this;
    }

    public function getSelectors(): array
    {
        return $this->selectors;
    }

    public function setSelectors(array $selectors): self
    {
        $this->selectors = $selectors;

        return $this;
    }


}
