<?php

declare(strict_types=1);

namespace App\Enums;

enum TaskPriority: int
{
    case LOW = 1;
    case MID = 2;
    case HIGH = 3;

    public function label(): string
    {
        return match ($this) {
            TaskPriority::LOW => '低',
            TaskPriority::MID => '中',
            TaskPriority::HIGH => '高',
        };
    }
}
