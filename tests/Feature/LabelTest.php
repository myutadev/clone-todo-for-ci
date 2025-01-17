<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Label;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LabelTest extends TestCase
{
    use RefreshDatabase;

    public function test_belongs_to_manyでリレーション先のタスクが取得できる(): void
    {
        $tasks = Task::factory(5)->create();
        $label = Label::factory()->create();

        $label->tasks()->attach($tasks[0]->id);
        $label->tasks()->attach($tasks[1]->id);

        $this->assertSame(2, $label->tasks->count());
    }

    public function test_belongs_to_manyでタスクがないときは空のコレクションを返す(): void
    {
        $label = Label::factory()->create();
        $this->assertEmpty($label->tasks);
    }
}
