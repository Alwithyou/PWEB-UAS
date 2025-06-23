@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <div class="bg-white shadow-md rounded-xl p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Pengguna</h2>
        <p class="text-3xl font-bold text-green-700">{{ $totalUser }}</p>
    </div>
    <div class="bg-white shadow-md rounded-xl p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Alat</h2>
        <p class="text-3xl font-bold text-green-700">{{ $totalAlat }}</p>
    </div>
    <div class="bg-white shadow-md rounded-xl p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Pesanan</h2>
        <p class="text-3xl font-bold text-green-700">{{ $totalPesanan }}</p>
    </div>
</div>
<div class="bg-white shadow-md rounded-xl p-6 mt-8">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Statistik</h2>
    <canvas id="dashboardChart" height="100"></canvas>
</div>

<script>
    const ctx = document.getElementById('dashboardChart').getContext('2d');
    const dashboardChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Pengguna', 'Alat', 'Pesanan'],
            datasets: [{
                label: 'Total',
                data: [{{ $totalUser }}, {{ $totalAlat }}, {{ $totalPesanan }}],
                backgroundColor: ['#10B981', '#3B82F6', '#F59E0B'], 
                borderRadius: 10,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision:0
                    }
                }
            }
        }
    });
</script>
@endsection
