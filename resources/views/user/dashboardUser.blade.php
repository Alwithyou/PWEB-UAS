@extends('layouts.userlayout')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 via-blue-50 to-emerald-50">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-green-800 via-emerald-700 to-teal-600 text-white py-16 mb-8">
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 text-white drop-shadow-lg">
                    Etalase Alat Camping
                </h1>
                <p class="text-xl text-green-100 max-w-2xl mx-auto">
                    Temukan peralatan camping berkualitas untuk petualangan tak terlupakan di alam bebas
                </p>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-green-50 to-transparent"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        @if($alat->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($alat as $item)
                    <a href="{{ route('alat.detail', $item->id) }}" 
                       class="group block bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 hover:border-green-200 transform hover:-translate-y-1">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" 
                                 class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute top-3 left-3">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 shadow-sm">
                                    Tersedia
                                </span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h2 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-green-700 transition-colors line-clamp-1">
                                {{ $item->name }}
                            </h2>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed">
                                {{ Str::limit($item->description, 80) }}
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold text-green-600">
                                        Rp{{ number_format($item->price_per_day, 0, ',', '.') }}
                                    </div>
                                    <div class="text-xs text-gray-500">per hari</div>
                                </div>
                                <div class="text-sm text-gray-500">
                                    Rating 4.8
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <button class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold rounded-full hover:from-green-700 hover:to-emerald-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Lihat Lebih Banyak
                </button>
            </div>
        @else
            <div class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <div class="w-32 h-32 mx-auto mb-6 bg-gradient-to-br from-green-100 to-emerald-100 rounded-full flex items-center justify-center">
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Belum Ada Alat Tersedia</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Saat ini belum ada peralatan camping yang tersedia untuk disewa. 
                        Silakan cek kembali nanti atau hubungi kami untuk informasi lebih lanjut.
                    </p>
                    <div class="space-y-4">
                        <button class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold rounded-full hover:from-green-700 hover:to-emerald-700 transition-all duration-200 shadow-lg">
                            Hubungi Kami
                        </button>
                        <div class="text-sm text-gray-500">
                            atau refresh halaman untuk memeriksa update terbaru
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
