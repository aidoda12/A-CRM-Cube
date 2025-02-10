@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold mb-6">Contacts</h1>

    <!-- Success Message -->
    @if(session('success'))
    <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif

    <!-- Search Bar -->
    <form action="{{ route('contacts.search') }}" method="GET" class="mb-6 flex">
        <input type="text" name="query" placeholder="Search contacts..." class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Search</button>
    </form>

    <!-- Add Contact Button -->
    <a href="{{ route('contacts.create') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">+ Add Contact</a>

    <!-- Contacts Table -->
    @if($contacts->count() > 0)
    <div class="overflow-x-auto">
        <table class="mt-6 w-full bg-white shadow-md rounded border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-6 py-3 border-b border-gray-300 text-gray-700">Name</th>
                    <th class="px-6 py-3 border-b border-gray-300 text-gray-700">Email</th>
                    <th class="px-6 py-3 border-b border-gray-300 text-gray-700">Phone</th>
                    <th class="px-6 py-3 border-b border-gray-300 text-gray-700">Role</th>
                    <th class="px-6 py-3 border-b border-gray-300 text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-gray-800">{{ $contact->name }}</td>
                    <td class="px-6 py-4 text-gray-800">{{ $contact->email }}</td>
                    <td class="px-6 py-4 text-gray-800">{{ $contact->phone }}</td>
                    <td class="px-6 py-4 text-gray-800">{{ $contact->role }}</td>
                    <td class="px-6 py-4 flex space-x-4">
                        <!-- Edit Button -->
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="text-blue-500 hover:underline">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination (Hides "Showing X to Y of Z results" but keeps numbers) -->
    <div class="mt-6 flex justify-center">
        {!! str_replace('<p class="text-sm text-gray-700 leading-5 dark:text-gray-400">', '<p class="hidden">', $contacts->links()) !!}
    </div>

    @else
    <div class="mt-6 bg-gray-100 p-4 text-gray-600 rounded">
        No contacts found. Click <a href="{{ route('contacts.create') }}" class="text-blue-500 hover:underline">here</a> to add a new contact.
    </div>
    @endif
</div>
@endsection
