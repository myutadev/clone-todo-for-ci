<?php

declare(strict_types=1);

namespace App\Enums;

enum UserType: int
{
    case ADMIN = 1;
    case USER = 2;

    public function label(): string
    {
        return match ($this) {
            UserType::ADMIN => '管理者',
            UserType::USER => '一般ユーザー',
        };
    }
}
