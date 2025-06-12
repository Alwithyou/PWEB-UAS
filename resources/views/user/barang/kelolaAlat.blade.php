@extends('layouts.userlayout')

@section('content')
<div class="px-4 py-10 bg-white">
    <div class="max-w-7xl mx-auto">

        <div class="bg-green-600 text-white rounded-xl p-6 shadow mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold">Kelola Peralatan Camping</h1>
                    <p class="text-sm text-green-100">Tambahkan atau ubah alat camping milikmu dengan mudah.</p>
                </div>
                <a href="{{ route('user.alat.tambah') }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-4 py-2 rounded shadow text-center">
                    + Tambah Gear
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6 shadow">
                {{ session('success') }}
            </div>
        @endif

        @if($alat->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($alat as $item)
                    <div class="bg-white border rounded-xl shadow-sm hover:shadow-md transition">
                        @if ($item->photo)
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" class="w-full h-48 object-cover rounded-t-xl">
                        @else
                            <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-sm text-gray-400 rounded-t-xl">
                                Tidak ada foto
                            </div>
                        @endif
                        <div class="p-4">
                            <h2 class="font-semibold text-gray-800 mb-1 truncate">{{ $item->name }}</h2>
                            <p class="text-sm text-gray-600 mb-2 line-clamp-2">{{ $item->description }}</p>
                            <div class="text-sm font-bold text-amber-600 mb-4">Rp {{ number_format($item->price_per_day, 0, ',', '.') }}</div>
                            <div class="flex gap-2">
                                <a href="{{ route('user.alat.edit', $item->id) }}" class="flex-1 bg-yellow-400 hover:bg-yellow-500 text-center text-sm text-gray-900 py-2 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('user.alat.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus gear ini?')" class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white text-sm py-2 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <div class="text-6xl mb-4">📦</div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Belum ada alat camping</h3>
                <p class="text-sm text-gray-500">Ayo tambahkan peralatanmu agar bisa disewakan.</p>
                <a href="{{ route('user.alat.tambah') }}" class="inline-block mt-6 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-5 py-2 rounded shadow">
                    + Tambah Sekarang
                </a>
            </div>
        @endif

    </div>
</div>
@endsection
