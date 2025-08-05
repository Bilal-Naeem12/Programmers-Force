<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
 
    public function index()
    {
         $studentCount = Student::count();
    $teacherCount = Teacher::count();
    $courseCount = Course::count();

    return view('pages.dashboard', compact('studentCount', 'teacherCount', 'courseCount'));
    }
}
