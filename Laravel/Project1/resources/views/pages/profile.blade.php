@extends('layouts.app')
@section('title', 'Profile')

@section('content')
<h2 class="text-xl font-bold mb-4">My Profile</h2>
<ul>
  <li>Name: {{ $user->name }}</li>
  <li>Email: {{ $user->email }}</li>
  <li>Role: {{ $user->role }}</li>
</ul>
@endsection
