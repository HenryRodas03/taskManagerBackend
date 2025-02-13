<?php

namespace Database\Factories;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->numberBetween(0, 3),
            'date' => Carbon::now()->addDays($this->faker->numberBetween(5, 21))->toDateString(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
