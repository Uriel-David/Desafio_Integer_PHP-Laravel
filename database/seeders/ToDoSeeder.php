<?php

namespace Database\Seeders;

use App\Models\ToDo;
use Illuminate\Database\Seeder;

class ToDoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ToDo::factory()->create([
            'title' => 'Task 1',
            'description' => 'Task Description 1',
        ]);

        ToDo::factory()->create([
            'title' => 'Task 2',
            'description' => 'Task Description 2',
        ]);
    }
}
