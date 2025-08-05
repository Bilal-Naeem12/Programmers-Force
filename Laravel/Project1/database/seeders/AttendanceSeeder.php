<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 
class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   // Only create students if not already present
    if (Student::count() < 50) {
        Student::factory()->count(50)->create();
    }

    $faker = Faker::create();
    $students = Student::all();
    $dates = collect(range(1, 30))->map(fn($i) => Carbon::now()->subDays($i)->toDateString());

    foreach ($dates as $date) {
        // Random daily attendance strength (90–95% normally, 60% occasionally)
        $attendanceRate = rand(1, 10) <= 2 ? rand(60, 70) : rand(90, 95);
        $studentsPresentCount = floor(($attendanceRate / 100) * $students->count());
        $studentsForToday = $students->random($studentsPresentCount);

        foreach ($students as $student) {
            $status = 'Absent';

            if ($studentsForToday->contains($student)) {
                // 70% chance Present, 20% Late, 10% Excused
                $status = $faker->randomElement([
                    'Present', 'Present', 'Present', 'Present', 'Present', 'Present', 'Present',
                    'Late', 'Late',
                    'Excused'
                ]);
            }

            Attendance::create([
                'student_id' => $student->id,
                'date' => $date,
                'status' => $status,
            ]);
        }
    }
    }
}
