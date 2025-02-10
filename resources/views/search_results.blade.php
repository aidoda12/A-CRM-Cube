@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Search Results for: "{{ $query }}"</h1>

    <!-- Leads Section -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h2 class="text-2xl font-semibold mb-4">Leads</h2>
        @if($leads->count() > 0)
            <ul class="space-y-3">
                @foreach ($leads as $lead)
                    <li class="p-3 bg-gray-100 rounded">
                        {{ $lead->name }} - {{ $lead->email }} - {{ $lead->phone }}
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No leads found.</p>
        @endif
    </div>

    <!-- Contacts Section -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h2 class="text-2xl font-semibold mb-4">Contacts</h2>
        @if($contacts->count() > 0)
            <ul class="space-y-3">
                @foreach ($contacts as $contact)
                    <li class="p-3 bg-gray-100 rounded">
                        {{ $contact->name }} - {{ $contact->email }} - {{ $contact->phone }}
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No contacts found.</p>
        @endif
    </div>

    <!-- Reports Section -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Reports</h2>
        @if($reports->count() > 0)
            <ul class="space-y-3">
                @foreach ($reports as $report)
                    <li class="p-3 bg-gray-100 rounded">
                        <strong>{{ $report->title }}</strong> - {{ $report->description }}
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No reports found.</p>
        @endif
    </div>
</div>
@endsection
