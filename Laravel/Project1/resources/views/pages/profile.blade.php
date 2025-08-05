@extends('layouts.app')
@section('title', 'Profile')

@section('content')
<h2 class="text-xl font-bold mb-4">My Profile</h2>
<ul>
  <li>Name: {{ auth()->user()->name }}</li>
  <li>Email: {{ auth()->user()->email }}</li>
  <li>Role: {{ auth()->user()->role }}</li>
</ul>
@endsection
