@extends('layouts.userlayout')

@section('content')
<div class="px-4 py-10 bg-gray-100 text-gray-800">
    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-green-600 to-green-700 text-white rounded-xl p-6 shadow mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold">Kelola Peralatan Camping</h1>
                    <p class="text-sm text-green-100">Lihat, ubah, dan hapus alat camping milikmu.</p>
                </div>
                <a href="{{ route('user.alat.tambah') }}" class="bg-amber-400 hover:bg-amber-500 text-stone-900 font-semibold px-5 py-2 rounded-lg shadow-md">
                    + Tambah Gear
                </a>
            </div>
        </div>

        {{-- Alert --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mb-6 shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel Alat --}}
        @if($alat->count())
        <div class="overflow-x-auto bg-white rounded-xl shadow">
            <table class="table-auto w-full text-left text-sm">
                <thead class="bg-green-100 text-gray-800">
                    <tr>
                        <th class="p-3">Foto</th>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Deskripsi</th>
                        <th class="p-3">Harga/Hari</th>
                        <th class="p-3">Status</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($alat as $item)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-3">
                            @if ($item->photo)
                                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400 italic">Tidak ada foto</span>
                            @endif
                        </td>
                        <td class="p-3 font-medium">{{ $item->name }}</td>
                        <td class="p-3 line-clamp-2 max-w-sm">{{ $item->description }}</td>
                        <td class="p-3 text-amber-600 font-semibold">Rp {{ number_format($item->price_per_day, 0, ',', '.') }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                {{ $item->status === 'available' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="p-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('user.alat.edit', $item->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-3 py-1 rounded text-sm font-semibold">
                                    Edit
                                </a>
                                <form action="{{ route('user.alat.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus gear ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm font-semibold">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        {{-- Kosong --}}
        <div class="text-center py-20">
            <div class="text-6xl mb-4">📦</div>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum ada alat camping</h3>
            <p class="text-sm text-gray-500">Yuk tambahkan alat agar bisa disewakan oleh pengguna lain!</p>
            <a href="{{ route('user.alat.tambah') }}" class="inline-block mt-6 bg-amber-400 hover:bg-amber-500 text-stone-900 font-semibold px-6 py-2 rounded-lg shadow">
                + Tambah Sekarang
            </a>
        </div>
        @endif

    </div>
</div>
@endsection
