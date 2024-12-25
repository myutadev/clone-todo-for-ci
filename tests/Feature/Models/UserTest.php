<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_has_manyでリレーション先のインスタンスが取得できる(): void
    {
        $user = User::factory()->create();
        Task::factory(5)->for($user)->create();
        $this->assertSame(5, $user->tasks->count());
    }

    public function test_user_typeがenum形式で値を返す(): void
    {
        $user = User::factory()->create([
            'user_type' => 1,
        ]);

        $this->assertSame('ADMIN', $user->user_type->name);
        $this->assertSame('管理者', $user->user_type->label());
    }
}
