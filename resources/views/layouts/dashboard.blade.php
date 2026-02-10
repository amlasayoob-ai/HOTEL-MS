@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Dashboard</h1>
    <span class="text-gray-300">
        Welcome, {{ Auth::user()->name }}
    </span>
</div>

<div class="bg-gray-900 p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-2">
        {{ ucfirst(Auth::user()->role) }} Dashboard
    </h2>

    <p class="text-gray-300">
        This page is visible only for
        <b>{{ Auth::user()->role }}</b>
    </p>
</div>

@endsection
