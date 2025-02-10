@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6">Search Results for "{{ $query }}"</h1>

    <!-- Leads Section -->
    @if($leads->count() > 0)
    <h2 class="text-2xl font-semibold mt-6">Leads</h2>
    <ul class="mt-4 space-y-2">
        @foreach($leads as $lead)
            <li class="p-3 bg-white shadow rounded">{{ $lead->name }} - {{ $lead->email }}</li>
        @endforeach
    </ul>
    @endif

    <!-- Contacts Section -->
    @if($contacts->count() > 0)
    <h2 class="text-2xl font-semibold mt-6">Contacts</h2>
    <ul class="mt-4 space-y-2">
        @foreach($contacts as $contact)
            <li class="p-3 bg-white shadow rounded">{{ $contact->name }} - {{ $contact->email }}</li>
        @endforeach
    </ul>
    @endif

    <!-- Reports Section -->
    @if($reports->count() > 0)
    <h2 class="text-2xl font-semibold mt-6">Reports</h2>
    <ul class="mt-4 space-y-2">
        @foreach($reports as $report)
            <li class="p-3 bg-white shadow rounded">{{ $report->title }}</li>
        @endforeach
    </ul>
    @endif

    <!-- No Results Found -->
    @if($leads->isEmpty() && $contacts->isEmpty() && $reports->isEmpty())
    <p class="mt-6 text-gray-600">No results found. Try another search.</p>
    @endif

    <!-- Back to Dashboard -->
    <a href="{{ route('dashboard') }}" class="mt-6 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back to Dashboard</a>
</div>
@endsection
