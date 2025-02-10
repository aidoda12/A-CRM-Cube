@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold mb-6">Settings</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- User Profile Settings -->
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <h2 class="text-2xl font-semibold mb-4">Profile Settings</h2>
        <form action="{{ route('settings.updateProfile') }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block mb-2">Name:</label>
            <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full p-2 border rounded mb-4" required>

            <label class="block mb-2">Email:</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full p-2 border rounded mb-4" required>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Save Changes
            </button>
        </form>
    </div>

    <!-- Change Password -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-4">Change Password</h2>
        <form action="{{ route('settings.changePassword') }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block mb-2">Current Password:</label>
            <input type="password" name="current_password" class="w-full p-2 border rounded mb-4" required>

            <label class="block mb-2">New Password:</label>
            <input type="password" name="new_password" class="w-full p-2 border rounded mb-4" required>

            <label class="block mb-2">Confirm New Password:</label>
            <input type="password" name="new_password_confirmation" class="w-full p-2 border rounded mb-4" required>

            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                Change Password
            </button>
        </form>
    </div>
</div>
@endsection
