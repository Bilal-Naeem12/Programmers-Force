<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Teacher;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
            'name' => $this->faker->randomElement(['Mathematics', 'Physics', 'English', 'Biology']),
            'code' => strtoupper($this->faker->unique()->bothify('??###')),
            'teacher_id' => Teacher::factory(),
        ];
    }
}
