@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Register</h2>

    @if ($errors->any())
        <div class="text-red-500 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full p-2 border rounded" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Register</button>
    </form>

    <p class="mt-4 text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login here</a></p>
</div>
@endsection
