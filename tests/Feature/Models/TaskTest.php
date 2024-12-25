<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Label;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_belongs_toでリレーション先のユーザーが取得できる(): void
    {
        $user = User::factory()->create();
        $task = Task::factory()->for($user)->create();
        assertEquals($user->id, $task->user->id);
    }

    public function test_belongs_to_manyでリレーション先のラベルが取得できる(): void
    {
        $task = Task::factory()->create();
        $label1 = Label::factory()->create();
        $label2 = Label::factory()->create();
        $task->labels()->attach($label1->id);
        $task->labels()->attach($label2->id);
        $this->assertSame(2, $task->labels->count());
    }

    public function test_belongs_to_manyでラベルがないときは空のコレクションを返す(): void
    {
        $task = Task::factory()->create();
        $this->assertEmpty($task->labels);
    }

    public function test_priorityがenum形式を返す(): void
    {
        $task = Task::factory()->create([
            'priority' => 1,
        ]);
        $this->assertSame('LOW', $task->priority->name);
        $this->assertSame('低', $task->priority->label());
    }

    public function test_statusがenum形式を返す(): void
    {
        $task = Task::factory()->create([
            'status' => 1,
        ]);
        $this->assertSame('NOT_STARTED', $task->status->name);
        $this->assertSame('未対応', $task->status->label());
    }
}
