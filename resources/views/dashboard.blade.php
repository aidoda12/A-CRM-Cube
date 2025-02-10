@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold mb-6">Dashboard</h1>

    <!-- Summary Cards -->
    <div class="grid grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold">Total Leads</h2>
            <p class="text-4xl font-bold mt-2 text-blue-500">{{ $totalLeads }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold">Total Contacts</h2>
            <p class="text-4xl font-bold mt-2 text-green-500">{{ $totalContacts }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold">Total Reports</h2>
            <p class="text-4xl font-bold mt-2 text-indigo-500">{{ $totalReports }}</p>
        </div>
    </div>

    <!-- Latest Leads & Contacts Section -->
    <div class="grid grid-cols-2 gap-6">
        <!-- Recent Leads -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-4">Recent Leads</h2>
            <ul class="space-y-3">
                @foreach ($latestLeads as $lead)
                    <li class="p-3 bg-gray-100 rounded">{{ $lead->name }} - {{ $lead->email }}</li>
                @endforeach
            </ul>
            <a href="{{ route('leads.index') }}" class="block mt-4 text-blue-500 hover:underline">View All Leads</a>
        </div>

        <!-- Recent Contacts -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-4">Recent Contacts</h2>
            <ul class="space-y-3">
                @foreach ($latestContacts as $contact)
                    <li class="p-3 bg-gray-100 rounded">{{ $contact->name }} - {{ $contact->role }}</li>
                @endforeach
            </ul>
            <a href="{{ route('contacts.index') }}" class="block mt-4 text-blue-500 hover:underline">View All Contacts</a>
        </div>
    </div>
</div>
@endsection
