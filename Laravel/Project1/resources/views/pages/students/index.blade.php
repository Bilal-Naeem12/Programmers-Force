<x-app-layout>
@section('content')
<h2 class="text-xl font-bold mb-4">Student List</h2>
<table class="table-auto w-full bg-white shadow">
  <thead>
    <tr class="bg-gray-100">
      <th class="px-4 py-2">Name</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $student)
    <tr>
      <td class="px-4 py-2">{{ $student->name }}</td>
      <td>{{ $student->email }}</td>
    </tr>
    @endforeach
  </tbody>
</table>


</x-app-layout>
