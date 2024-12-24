<?php
declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use App\Models\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_belongsToでリレーション先のユーザーが取得できる(): void
    {
        $user = User::factory()->create();
        $task = Task::factory()->for($user)->create();
        assertEquals($user->id,$task->user->id);
    }

    public function test_belongsToManyでリレーション先のラベルが取得できる(): void
    {
        $task = Task::factory()->create();
        $label1 = Label::factory()->create();
        $label2 = Label::factory()->create();
        $task->labels()->attach($label1->id);
        $task->labels()->attach($label2->id);
        $this->assertSame(2, $task->labels->count());
    }

    public function test_belongsToManyでラベルがないときは空のコレクションを返す(): void
    {
        $task = Task::factory()->create();
        $this->assertEmpty($task->labels);
    }
}
