@extends('layouts.userlayout')

@section('content')
    <h1 class="text-xl font-bold mb-4">Daftar Pesanan Masuk</h1>

    @if($pesanan->count() > 0)
        <div class="space-y-4">
            @foreach($pesanan as $t)
                <div class="bg-white p-4 rounded shadow flex flex-col md:flex-row justify-between items-start">
                    <div>
                        <h2 class="font-semibold text-lg">{{ $t->pengguna->name }} ({{ $t->pengguna->email }})</h2>
                        <p class="text-sm text-gray-600">Periode: {{ $t->start_date }} - {{ $t->end_date }}</p>
                        <p class="text-sm text-gray-600">Status: 
                            <span class="font-semibold {{ $t->status == 'pending' ? 'text-yellow-500' : ($t->status == 'approved' ? 'text-green-500' : 'text-red-500') }}">
                                {{ ucfirst($t->status) }}
                            </span>
                        </p>
                    </div>
                    <a href="{{ route('user.pesanan.detail', $t->id) }}" class="mt-2 md:mt-0 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lihat Detail</a>
                </div>
            @endforeach
        </div>
    @else
        <p>Tidak ada pesanan masuk.</p>
    @endif
@endsection
