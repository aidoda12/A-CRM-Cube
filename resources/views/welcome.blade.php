@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="text-center bg-white p-10 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome to A-Cube CRM</h1>
        <p class="text-gray-600 mb-6">Manage your leads, contacts, and reports efficiently.</p>

        <div class="space-x-4">
            <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Login</a>
            <a href="{{ route('register') }}" class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600">Register</a>
        </div>
    </div>
</div>
@endsection
