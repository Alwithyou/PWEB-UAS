@extends('layouts.userlayout')

@section('content')
<div class="p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Kelola Alat Anda</h1>
        <a href="{{ route('user.alat.tambah') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Tambah Alat
        </a>
    </div>

    @if($alatSaya->isEmpty())
        <p class="text-gray-500">Anda belum menambahkan alat camping.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($alatSaya as $alat)
                <div class="border rounded-lg shadow p-4">
                    <img src="{{ asset('storage/' . $alat->photo) }}" alt="{{ $alat->name }}" class="w-full h-40 object-cover rounded mb-2">
                    <h2 class="text-lg font-semibold">{{ $alat->name }}</h2>
                    <p class="text-sm text-gray-600">{{ $alat->description }}</p>
                    <p class="mt-2 font-bold text-blue-600">Rp {{ number_format($alat->price_per_day, 0, ',', '.') }}/hari</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
