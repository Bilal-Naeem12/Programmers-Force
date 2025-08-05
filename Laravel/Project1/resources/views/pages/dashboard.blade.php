@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h2 class="text-2xl font-bold mb-4">Welcome, {{ auth()->user()->name }}</h2>
<p>You are logged in as a {{ auth()->user()->role }}.</p>
@endsection
