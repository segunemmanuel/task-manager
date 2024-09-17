<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(5),  // Generate a random task name
            'priority' => $this->faker->numberBetween(1, 10),  // Generate a random priority between 1 and 10
            'project_id' => Project::factory(),  // Associate task with a randomly created project
        ];
    }
}
