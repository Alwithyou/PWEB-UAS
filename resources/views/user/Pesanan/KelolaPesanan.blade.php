@extends('layouts.userlayout')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Pesanan Masuk</h1>

    @if($pesanan->count() > 0)
        <div class="space-y-4">
            @foreach($pesanan as $t)
                <div class="bg-white p-5 rounded-xl shadow-md border border-gray-200 flex flex-col md:flex-row md:items-center md:justify-between transition hover:shadow-lg">
                    <div>
                        <h2 class="text-lg font-semibold text-stone-800 mb-1">
                            {{ $t->pengguna->name }}
                            <span class="text-sm text-stone-500">({{ $t->pengguna->email }})</span>
                        </h2>
                        <p class="text-sm text-gray-600"><strong>Periode:</strong> {{ $t->start_date }} - {{ $t->end_date }}</p>
                        <p class="text-sm text-gray-600 mt-1">
                            <strong>Status:</strong>
                            <span class="inline-block px-2 py-1 text-white text-xs font-semibold rounded 
                                @switch($t->status)
                                    @case('pending') bg-yellow-500 @break
                                    @case('approved') bg-green-500 @break
                                    @case('rejected') bg-red-500 @break
                                    @case('menunggu_pembayaran') bg-blue-500 @break
                                    @case('menunggu_pengambilan') bg-indigo-500 @break
                                    @case('disewa') bg-purple-500 @break
                                    @case('returned') bg-green-600 @break
                                    @default bg-gray-500
                                @endswitch">
                                {{ ucwords(str_replace('_', ' ', $t->status)) }}
                            </span>
                        </p>
                    </div>

                    <a href="{{ route('user.pesanan.detail', $t->id) }}"
                       class="mt-4 md:mt-0 inline-block bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium px-5 py-2 rounded-lg shadow hover:from-blue-700 hover:to-blue-800 transition-all duration-300">
                        Lihat Detail
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded shadow text-sm font-medium">
            Tidak ada pesanan masuk.
        </div>
    @endif
@endsection
