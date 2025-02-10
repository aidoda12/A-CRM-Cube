@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold mb-6 text-center">Reports & Insights</h1>

    <!-- Annual Sales Report Section -->
    <div class="bg-white p-6 rounded-lg shadow text-center mb-10">
        <h2 class="text-3xl font-bold text-blue-600">Annual Sales Report</h2>
        <p class="text-lg mt-2 text-gray-700">Overview of yearly performance.</p>
    </div>

    <!-- Summary Section -->
    <div class="grid grid-cols-2 gap-6 mb-10">
        <div class="bg-white p-6 rounded-lg shadow text-center">
            <h2 class="text-2xl font-semibold">Total Leads</h2>
            <p class="text-4xl font-bold mt-2">{{ $totalLeads }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow text-center">
            <h2 class="text-2xl font-semibold">Total Contacts</h2>
            <p class="text-4xl font-bold mt-2">{{ $totalContacts }}</p>
        </div>
    </div>

    <!-- Graph Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Leads Per Month (Bar Chart) -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-4 text-center">Leads Per Month</h2>
            <div class="flex justify-center">
                <canvas id="leadsChart" style="max-width: 400px; max-height: 300px;"></canvas>
            </div>
        </div>

        <!-- Contact Roles Distribution (Pie Chart) -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-4 text-center">Contact Roles Distribution</h2>
            <div class="flex justify-center">
                <canvas id="contactsChart" style="max-width: 400px; max-height: 300px;"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Leads Per Month Data
    var leadsCtx = document.getElementById('leadsChart').getContext('2d');
    var leadsChart = new Chart(leadsCtx, {
        type: 'bar',
        data: {
            labels: @json(array_keys($leadsPerMonth->toArray())),
            datasets: [{
                label: 'Leads Count',
                data: @json(array_values($leadsPerMonth->toArray())),
                backgroundColor: 'rgba(54, 162, 235, 0.6)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { ticks: { font: { size: 12 } } },
                y: { ticks: { font: { size: 12 } } }
            }
        }
    });

    // Contact Roles Distribution Data
    var contactsCtx = document.getElementById('contactsChart').getContext('2d');
    var contactsChart = new Chart(contactsCtx, {
        type: 'pie',
        data: {
            labels: @json(array_keys($contactRoles->toArray())),
            datasets: [{
                data: @json(array_values($contactRoles->toArray())),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#9966FF']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { font: { size: 12 } }
                }
            }
        }
    });
</script>
@endsection
