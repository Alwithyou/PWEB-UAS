@extends('layouts.userlayout')

@section('content')
    <h1 class="text-xl font-bold mb-4">Etalase Alat Camping</h1>

    @if($alat->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($alat as $item)
                <div class="bg-white rounded-lg shadow p-4">
                    <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" class="w-full h-40 object-cover rounded">
                    <h2 class="text-lg font-semibold mt-2">{{ $item->name }}</h2>
                    <p class="text-gray-600 text-sm">{{ $item->description }}</p>
                    <div class="mt-2 text-blue-500 font-bold">Rp{{ number_format($item->price_per_day, 0, ',', '.') }}/hari</div>
                </div>
            @endforeach
        </div>
    @else
        <p>Tidak ada alat yang tersedia saat ini.</p>
    @endif
@endsection
