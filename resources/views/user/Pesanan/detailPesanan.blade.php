@extends('layouts.userlayout')

@section('content')
    <h1 class="text-xl font-bold mb-4">Detail Pesanan</h1>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold">Penyewa: {{ $transaksi->pengguna->name }}</h2>
        <p class="text-sm text-gray-600 mb-2">Email: {{ $transaksi->pengguna->email }}</p>

        <hr class="my-2">

        <p><strong>Alamat:</strong> {{ $transaksi->address }}</p>
        <p><strong>Tanggal Sewa:</strong> {{ $transaksi->start_date }} - {{ $transaksi->end_date }}</p>
        <p><strong>Status:</strong> 
            <span class="font-semibold {{ $transaksi->status == 'pending' ? 'text-yellow-500' : ($transaksi->status == 'approved' ? 'text-green-500' : 'text-red-500') }}">
                {{ ucfirst($transaksi->status) }}
            </span>
        </p>

        <hr class="my-2">

        <h3 class="font-semibold">Alat Disewa:</h3>
        @foreach($transaksi->detailTransaksi as $detail)
            <div class="mt-2 p-2 border rounded">
                <p><strong>{{ $detail->alatCamping->name }}</strong></p>
                <p class="text-sm">{{ $detail->alatCamping->description }}</p>
                <p class="text-sm">Harga/hari: Rp{{ number_format($detail->price_per_day, 0, ',', '.') }}</p>
            </div>
        @endforeach

        @if($transaksi->status === 'pending')
            <div class="mt-4 flex space-x-2">
                <form method="POST" action="{{ route('user.pesanan.approve', $transaksi->id) }}">
                    @csrf
                    <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Setujui</button>
                </form>
                <form method="POST" action="{{ route('user.pesanan.reject', $transaksi->id) }}">
                    @csrf
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Tolak</button>
                </form>
            </div>
        @endif
    </div>
@endsection