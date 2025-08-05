@extends('layouts.app')
@section('title', 'Courses')

@section('content')
<h2 class="text-xl font-bold mb-4">Course List</h2>

<table class="table-auto w-full bg-white shadow">
    <thead>
        <tr class="bg-gray-100 text-left">
            <th class="px-4 py-2">Course Name</th>
            <th class="px-4 py-2">Course Code</th>
            <th class="px-4 py-2">Teacher</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($courses as $course)
            <tr>
                <td class="px-4 py-2">{{ $course->name }}</td>
                <td class="px-4 py-2">{{ $course->code }}</td>
                <td class="px-4 py-2">
                    {{ $course->teacher->name ?? 'Unassigned' }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="px-4 py-2 text-center text-gray-500">No courses found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
