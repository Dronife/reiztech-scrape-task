<?php declare(strict_types=1);

namespace App\Enums;

enum JobStatus: string
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case COMPLETED = 'completed';
    case FAILED = 'failed';

    /**
     * @return array<int, string>
     */
    public static function values(): array
    {
        return array_column(JobStatus::cases(), 'value');
    }
}
