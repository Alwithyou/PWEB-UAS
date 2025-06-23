@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Card 1: Total User -->
    <div class="bg-white shadow-md rounded-xl p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Pengguna</h2>
        <p class="text-3xl font-bold text-green-700">{{ $totalUser }}</p>
    </div>

    <!-- Card 2: Total Alat -->
    <div class="bg-white shadow-md rounded-xl p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Alat</h2>
        <p class="text-3xl font-bold text-green-700">{{ $totalAlat }}</p>
    </div>

    <!-- Card 3: Total Pesanan -->
    <div class="bg-white shadow-md rounded-xl p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Pesanan</h2>
        <p class="text-3xl font-bold text-green-700">{{ $totalPesanan }}</p>
    </div>
</div>
@endsection
