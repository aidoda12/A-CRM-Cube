@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Settings</h1>

    <form class="bg-white shadow-md rounded-lg p-6">
        <label class="block mb-4">
            <span class="text-gray-700">Email Notifications</span>
            <select class="block w-full mt-1 rounded">
                <option>Enable</option>
                <option>Disable</option>
            </select>
        </label>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Changes</button>
    </form>
</div>
@endsection