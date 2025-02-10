@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Login</h2>

    @if ($errors->any())
        <div class="text-red-500 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Login</button>
    </form>

    <p class="mt-4 text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500">Register here</a></p>
</div>
@endsection
