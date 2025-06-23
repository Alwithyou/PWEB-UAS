@extends('layouts.admin')
@section('content')
<h2 class="text-2xl font-semibold mb-4">Kelola Pesanan</h2>
<table class="table-auto w-full bg-white shadow rounded-lg">
    <thead>
        <tr class="bg-green-100 text-left">
            <th class="p-2">Penyewa</th>
            <th class="p-2">Tanggal Sewa</th>
            <th class="p-2">Status</th>
            <th class="p-2">Alamat</th>
            <th class="p-2">Catatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pesanan as $p)
        <tr class="border-b">
            <td class="p-2">{{ $p->pengguna->name }}</td>
            <td class="p-2">{{ $p->start_date }} s/d {{ $p->end_date }}</td>
            <td class="p-2">{{ $p->status }}</td>
            <td class="p-2">{{ $p->address }}</td>
            <td class="p-2">{{ $p->notes }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
