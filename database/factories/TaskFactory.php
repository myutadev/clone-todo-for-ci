<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
                'user_id' => User::factory(),
                'name' => fake()->userName(10),
                'description' => fake()->realText(30),
                'priority' => 1,
                'status' => 1
        ];
    }
}
