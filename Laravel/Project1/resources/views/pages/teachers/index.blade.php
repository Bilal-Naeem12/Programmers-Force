@extends('layouts.app')
@section('title', 'Teachers')

@section('content')
<h2 class="text-xl font-bold mb-4">Teacher List</h2>

<table class="table-auto w-full bg-white shadow">
    <thead>
        <tr class="bg-gray-100 text-left">
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Specialization</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($teachers as $teacher)
            <tr>
                <td class="px-4 py-2">{{ $teacher->name }}</td>
                <td class="px-4 py-2">{{ $teacher->email }}</td>
                <td class="px-4 py-2">{{ $teacher->specialization ?? 'N/A' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="px-4 py-2 text-center text-gray-500">No teachers found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
