<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;

// Landing page
Route::get('/', function () {
    return view('welcome');
});

// Testable simple routes without auth for now
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
