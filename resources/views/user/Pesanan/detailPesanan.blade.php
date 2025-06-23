@extends('layouts.userlayout')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-6 space-y-6">
    <h1 class="text-2xl font-bold text-gray-800 border-b pb-2">Detail Pesanan</h1>

    {{-- Informasi Penyewa --}}
    <div>
        <h2 class="text-lg font-semibold text-stone-800 mb-2">Informasi Penyewa</h2>
        <div class="space-y-1 text-gray-700">
            <p><strong>Nama:</strong> {{ $transaksi->pengguna->name }}</p>
            <p><strong>Email:</strong> {{ $transaksi->pengguna->email }}</p>
        </div>
    </div>

    {{-- Informasi Pemesanan --}}
    <div>
        <h2 class="text-lg font-semibold text-stone-800 mb-2">Detail Pemesanan</h2>
        <div class="space-y-1 text-gray-700">
            <p><strong>Tanggal Sewa:</strong> {{ $transaksi->start_date }} s/d {{ $transaksi->end_date }}</p>
            <p><strong>Alamat Pengambilan:</strong> {{ $transaksi->address }}</p>
            <p><strong>Status:</strong>
                <span class="inline-block px-2 py-1 rounded text-white text-sm
                    @switch($transaksi->status)
                        @case('pending') bg-yellow-500 @break
                        @case('approved') bg-green-500 @break
                        @case('rejected') bg-red-500 @break
                        @case('menunggu_pengambilan') bg-blue-600 @break
                        @case('disewa') bg-indigo-600 @break
                        @case('returned') bg-green-600 @break
                        @default bg-gray-500
                    @endswitch">
                    {{ ucfirst(str_replace('_', ' ', $transaksi->status)) }}
                </span>
            </p>
            @if($transaksi->returned_at)
                <p><strong>Tanggal Pengembalian:</strong> {{ $transaksi->returned_at }}</p>
            @endif
            @if($transaksi->notes)
                <p><strong>Catatan:</strong> {{ $transaksi->notes }}</p>
            @endif
        </div>
    </div>

    {{-- Foto Identitas --}}
    @if($transaksi->identity_photo)
    <div>
        <h2 class="text-lg font-semibold text-stone-800 mb-2">Foto Identitas</h2>
        <img src="{{ asset('storage/' . $transaksi->identity_photo) }}" class="w-48 rounded shadow" alt="Identitas">
    </div>
    @endif

    {{-- Bukti Pembayaran --}}
    @if($transaksi->bukti_pembayaran)
    <div>
        <h2 class="text-lg font-semibold text-stone-800 mb-2">Bukti Pembayaran</h2>
        <img src="{{ asset('storage/' . $transaksi->bukti_pembayaran) }}" class="w-64 rounded shadow" alt="Bukti Pembayaran">
    </div>
    @endif

    {{-- Informasi Alat --}}
    @php $detail = $transaksi->detailTransaksi; @endphp
    @if($detail && $detail->alatCamping)
    <div>
        <h2 class="text-lg font-semibold text-stone-800 mb-2">Alat Disewa</h2>
        <div class="p-4 border rounded-lg bg-gray-50 text-gray-700 space-y-2">
            <p><strong>Nama Alat:</strong> {{ $detail->alatCamping->name }}</p>
            <p><strong>Deskripsi:</strong> {{ $detail->alatCamping->description }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($detail->total_price, 0, ',', '.') }}</p>
            @if($detail->alatCamping->photo)
                <img src="{{ asset('storage/' . $detail->alatCamping->photo) }}" class="w-48 mt-2 rounded shadow" alt="Foto Alat">
            @endif
        </div>
    </div>
    @else
        <p class="text-red-500">Detail alat tidak ditemukan.</p>
    @endif

    {{-- Tombol Aksi --}}
    <div class="space-y-4">
        @if($transaksi->status === 'pending')
            {{-- APPROVE --}}
            <form method="POST" action="{{ route('user.pesanan.approve', $transaksi->id) }}" class="bg-green-50 p-4 rounded-lg border border-green-200">
                @csrf
                <label class="block text-sm font-medium text-gray-700 mb-1">Catatan (Opsional):</label>
                <textarea name="notes" rows="2" class="w-full p-2 border rounded mb-3" placeholder="Tulis catatan beserta nomor dana/gopay...">{{ old('notes') }}</textarea>
                <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Setujui Pesanan
                </button>
            </form>

            {{-- REJECT --}}
            <form method="POST" action="{{ route('user.pesanan.reject', $transaksi->id) }}" class="bg-red-50 p-4 rounded-lg border border-red-200">
                @csrf
                <label class="block text-sm font-medium text-gray-700 mb-1">Catatan (Opsional):</label>
                <textarea name="notes" rows="2" class="w-full p-2 border rounded mb-3" placeholder="Tulis alasan penolakan...">{{ old('notes') }}</textarea>
                <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Tolak Pesanan
                </button>
            </form>

        @elseif($transaksi->status === 'menunggu_pengambilan')
            <form method="POST" action="{{ route('user.pesanan.ubahSewa', $transaksi->id) }}">
                @csrf
                <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Tandai Sudah Diambil
                </button>
            </form>

        @elseif($transaksi->status === 'disewa')
            <form method="POST" action="{{ route('user.pesanan.kembalikan', $transaksi->id) }}">
                @csrf
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Tandai Sudah Dikembalikan
                </button>
            </form>
        @endif
    </div>

    {{-- Back Button --}}
    <div class="pt-6">
        <a href="{{ route('user.pesanan.kelola') }}" class="text-blue-600 hover:underline">
            ← Kembali ke Daftar Pesanan
        </a>
    </div>
</div>
@endsection
