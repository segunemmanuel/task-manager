<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch all available projects for task association
        $projects = Project::all();

        // If there are no projects, create some first
        if ($projects->isEmpty()) {
            $projects = Project::factory()->count(5)->create();
        }

        // Create 20 sample tasks and associate them with random projects
        Task::factory()->count(20)->create([
            'project_id' => $projects->random()->id,  // Assign a random project ID to each task
        ]);
    }
}
