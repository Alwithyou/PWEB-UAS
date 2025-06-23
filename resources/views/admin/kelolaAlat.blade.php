@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Kelola Alat</h2>

<div class="overflow-x-auto">
    <table class="table-auto w-full bg-white shadow rounded-lg">
        <thead>
            <tr class="bg-green-100 text-left">
                <th class="p-2">Foto</th>
                <th class="p-2">Nama</th>
                <th class="p-2">Deskripsi</th>
                <th class="p-2">Harga</th>
                <th class="p-2">Pemilik</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alat as $item)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-2">
                    @if ($item->photo)
                        <img src="{{ asset('storage/' . $item->photo) }}" alt="Foto {{ $item->name }}"
                             class="w-16 h-16 object-cover rounded-md shadow">
                    @else
                        <span class="text-gray-400 italic">Tidak ada foto</span>
                    @endif
                </td>
                <td class="p-2">{{ $item->name }}</td>
                <td class="p-2 max-w-xs truncate">{{ $item->description }}</td>
                <td class="p-2">Rp{{ number_format($item->price_per_day) }}</td>
                <td class="p-2">{{ $item->pengguna->name }}</td>
                <td class="p-2">
                    <span class="px-2 py-1 text-sm rounded-full 
                        {{ $item->status === 'available' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
