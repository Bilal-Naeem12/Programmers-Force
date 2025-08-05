<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Course;

use \App\Models\Teacher;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'course_id' => Course::factory(),
            'teacher_id' => Teacher::factory(),
            'due_date' => $this->faker->dateTimeBetween('now', '+2 months'),
        ];
    }
}
