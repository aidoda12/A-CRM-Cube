@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold mb-6">Leads</h1>

    <!-- Success Message -->
    @if(session('success'))
    <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif

    <!-- Search Bar -->
    <form action="{{ route('leads.index') }}" method="GET" class="mb-6 flex">
        <input type="text" name="query" value="{{ request('query') }}" placeholder="Search leads..." 
               class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Search</button>
    </form>

    <!-- Add Lead Button -->
    <a href="{{ route('leads.create') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">+ Add Lead</a>

    <!-- Show search result count -->
    @if(request('query'))
    <p class="text-sm text-gray-600 mt-4 mb-6 text-center">
        <span class="font-medium text-gray-800">Showing {{ $leads->count() }} results</span> 
        for 
        <span class="font-semibold text-blue-600">"{{ request('query') }}"</span>.
        <a href="{{ route('leads.index') }}" class="text-blue-500 font-medium hover:underline">Reset Search</a>
    </p>
    @endif

    <!-- Leads Table -->
    @if($leads->count() > 0)
    <div class="overflow-x-auto">
        <table class="mt-6 w-full bg-white shadow-md rounded border border-gray-200">
            <thead class="bg-gray-100 text-gray-700 text-lg font-bold">
                <tr class="text-left">
                    <th class="px-6 py-3 border-b">Name</th>
                    <th class="px-6 py-3 border-b">Email</th>
                    <th class="px-6 py-3 border-b">Phone</th>
                    <th class="px-6 py-3 border-b">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-base">
                @foreach ($leads as $lead)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $lead->name }}</td>
                    <td class="px-6 py-4">{{ $lead->email }}</td>
                    <td class="px-6 py-4">{{ $lead->phone }}</td>
                    <td class="px-6 py-4">
                        <!-- Edit Button -->
                        <a href="{{ route('leads.edit', $lead->id) }}" class="text-blue-500 hover:underline">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ml-4">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        {{ $leads->appends(['query' => request('query')])->links() }}
    </div>

    @else
    <div class="mt-6 bg-gray-100 p-4 text-gray-600 rounded">
        @if(request('query'))
        No leads found for "{{ request('query') }}". 
        <a href="{{ route('leads.index') }}" class="text-blue-500 hover:underline">Reset search</a>.
        @else
        No leads found. Click <a href="{{ route('leads.create') }}" class="text-blue-500 hover:underline">here</a> to add a new lead.
        @endif
    </div>
    @endif
</div>
@endsection
