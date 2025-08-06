<x-app-layout>
    <x-slot name="header">
<h2 class="text-2xl font-bold mb-4">Dashboard Overview</h2>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
    <div class="bg-white rounded shadow p-4 text-center">
        <h3 class="text-xl font-semibold text-blue-600">Students</h3>
        <p class="text-3xl font-bold mt-2">{{ $studentCount }}</p>
    </div>

    <div class="bg-white rounded shadow p-4 text-center">
        <h3 class="text-xl font-semibold text-green-600">Teachers</h3>
        <p class="text-3xl font-bold mt-2">{{ $teacherCount }}</p>
    </div>

    <div class="bg-white rounded shadow p-4 text-center">
        <h3 class="text-xl font-semibold text-purple-600">Courses</h3>
        <p class="text-3xl font-bold mt-2">{{ $courseCount }}</p>
    </div>
</div>
</x-app-layout>
