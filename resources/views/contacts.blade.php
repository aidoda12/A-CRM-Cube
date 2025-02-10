@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Contacts</h1>
    <p class="text-gray-600 mb-8">Manage your customer and client information here.</p>

    <!-- Search Bar -->
    <div class="mb-6 flex items-center">
        <input
            type="text"
            class="flex-1 p-3 rounded-lg border border-gray-300"
            placeholder="Search Contacts..."
        />
        <button class="ml-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
            + Add New Contact
        </button>
    </div>

    <!-- Contacts Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Phone</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-gray-700 flex items-center space-x-4">
                        <img src="https://via.placeholder.com/40" alt="Avatar" class="w-10 h-10 rounded-full">
                        <span>Jane Doe</span>
                    </td>
                    <td class="px-6 py-4 text-gray-700">jane@example.com</td>
                    <td class="px-6 py-4 text-gray-700">(123) 456-7890</td>
                    <td class="px-6 py-4">
                        <button class="text-blue-500 hover:underline">Edit</button>
                        <button class="ml-4 text-red-500 hover:underline">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
