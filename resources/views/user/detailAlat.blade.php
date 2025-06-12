@extends('layouts.userlayout')

@section('content')
    <div class="max-w-2xl mx-auto px-4 py-6">
        <!-- Main Card Container -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            
            <!-- Hero Image Section -->
            <div class="relative overflow-hidden">
                <img src="{{ asset('storage/' . $alat->photo) }}" 
                     alt="{{ $alat->name }}" 
                     class="w-full h-64 sm:h-72 object-cover hover:scale-105 transition-transform duration-300">
            </div>

            <!-- Content Section -->
            <div class="p-6">
                
                <!-- Header Section -->
                <div class="mb-5">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3">
                        {{ $alat->name }}
                    </h1>
                    
                    <!-- Price Badge -->
                    <div class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md">
                        <span class="text-lg font-semibold">
                            Rp{{ number_format($alat->price_per_day, 0, ',', '.') }}
                        </span>
                        <span class="text-blue-100 ml-1">/hari</span>
                    </div>
                </div>

                <!-- Description Section -->
                <div class="mb-6">
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-2">
                        Deskripsi
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        {{ $alat->description }}
                    </p>
                </div>

                <!-- Owner Information -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-400 rounded-full flex items-center justify-center mr-3">
                            <iconify-icon icon="ion:person-circle" class="text-white text-xl"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-medium">Pemilik</p>
                            <p class="text-base font-semibold text-gray-900">{{ $alat->pengguna->name }}</p>
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div>
                    <a href="{{ route('alat.formSewa', $alat->id) }}" 
                       class="w-full inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <iconify-icon icon="ion:calendar" class="w-5 h-5 mr-2"></iconify-icon>
                        Sewa Sekarang
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
