<?php declare(strict_types=1);

namespace App\Jobs;

use App\Enums\JobStatus;
use App\Exceptions\UnableToUpdateException;
use App\Services\Job\JobModifierService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private readonly array $data )
    {
    }

    public function handle(JobModifierService $jobModifierService): void
    {
        echo("Starting to process job\n");
        try {
            $jobModifierService->update($this->data, ['status' => JobStatus::COMPLETED->value]);
            echo("Job has been processed\n");
        } catch (UnableToUpdateException $exception) {
            echo($exception->getMessage());
        }
    }
}
