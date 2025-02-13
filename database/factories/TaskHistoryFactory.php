<?php

namespace Database\Factories;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskHistory>
 */
class TaskHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $task = Task::inRandomOrder()->first(); // Obtiene una tarea aleatoria

        return [
            'task_id' => $task->id,
            'previous_status' => $this->faker->numberBetween(0, 3),
            'new_status' => $this->faker->numberBetween(0, 3),
            'changed_at' => Carbon::now()->subDays($this->faker->numberBetween(1, 5)),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
