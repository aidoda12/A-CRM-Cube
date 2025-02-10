@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold mb-6">Add New Lead</h1>

    <form action="{{ route('leads.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold">Name:</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold">Email:</label>
            <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700 font-bold">Phone:</label>
            <input type="text" name="phone" id="phone" class="w-full p-2 border rounded">
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Save Lead</button>
    </form>
</div>
@endsection
