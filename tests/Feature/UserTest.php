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

    public function test_hasManyでリレーション先のインスタンスが取得できる(): void
    {
        $user = User::factory()->create();
        Task::factory(5)->for($user)->create();
        $this->assertSame(5, $user->tasks->count());
    }
}
