<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Assignment;
use App\Models\Attendance;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    $this->call(AttendanceSeeder::class);


    Teacher::factory(5)->create();
  Course::factory(10)->create();
  Student::factory()->count(50)->create();
  Enrollment::factory(40)->create();
  Assignment::factory(20)->create();

    }
}
