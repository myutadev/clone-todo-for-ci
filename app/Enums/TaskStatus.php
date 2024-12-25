<?php

declare(strict_types=1);

namespace App\Enums;

enum TaskStatus: int
{
    case NOT_STARTED = 1;
    case IN_PROGRESS = 2;
    case DONE = 3;

    public function label(): string
    {
        return match ($this) {
            TaskStatus::NOT_STARTED => '未対応',
            TaskStatus::IN_PROGRESS => '処理中',
            TaskStatus::DONE => '完了',
        };
    }
}
