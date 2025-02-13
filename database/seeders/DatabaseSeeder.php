<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        Task::factory()->count(10)->create();
    }
}
