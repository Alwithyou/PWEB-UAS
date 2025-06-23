@extends('layouts.userlayout')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">Detail Pesanan</h1>

    {{-- Informasi Penyewa --}}
    <div class="mb-4">
        <p><strong>Nama Penyewa:</strong> {{ $transaksi->pengguna->name }}</p>
        <p><strong>Email:</strong> {{ $transaksi->pengguna->email }}</p>
    </div>

    {{-- Informasi Pemesanan --}}
    <div class="mb-4">
        <p><strong>Tanggal Sewa:</strong> {{ $transaksi->start_date }} s/d {{ $transaksi->end_date }}</p>
        <p><strong>Alamat Pengambilan:</strong> {{ $transaksi->address }}</p>
        <p><strong>Status:</strong> 
            <span class="inline-block px-2 py-1 rounded text-white
                @if($transaksi->status === 'pending') bg-yellow-500
                @elseif($transaksi->status === 'approved') bg-green-500
                @elseif($transaksi->status === 'rejected') bg-red-500
                @elseif($transaksi->status === 'menunggu_pengambilan') bg-blue-600
                @elseif($transaksi->status === 'disewa') bg-indigo-600
                @elseif($transaksi->status === 'returned') bg-green-600
                @endif">
                {{ ucfirst($transaksi->status) }}
            </span>
        </p>
        @if($transaksi->returned_at)
            <p><strong>Tanggal Pengembalian:</strong> {{ $transaksi->returned_at }}</p>
        @endif

        @if($transaksi->notes)
            <p class="mt-2"><strong>Catatan:</strong> {{ $transaksi->notes }}</p>
        @endif
    </div>

    {{-- Foto Identitas --}}
    @if($transaksi->identity_photo)
    <div class="mb-4">
        <h2 class="text-lg font-semibold">Foto Identitas Penyewa</h2>
        <img src="{{ asset('storage/' . $transaksi->identity_photo) }}" class="w-40 mt-2 rounded" alt="Identitas">
    </div>
    @endif

    {{-- Bukti Pembayaran --}}
    @if($transaksi->bukti_pembayaran)
    <div class="mb-4">
        <h2 class="text-lg font-semibold">Bukti Pembayaran</h2>
        <img src="{{ asset('storage/' . $transaksi->bukti_pembayaran) }}" class="w-64 mt-2 rounded shadow" alt="Bukti Pembayaran">
    </div>
    @endif

    {{-- Informasi Alat --}}
    @php $detail = $transaksi->detailTransaksi; @endphp
    @if($detail && $detail->alatCamping)
    <div class="mb-4">
        <h2 class="text-lg font-semibold">Alat Disewa</h2>
        <div class="border rounded p-3 mt-2">
            <p><strong>Nama Alat:</strong> {{ $detail->alatCamping->name }}</p>
            <p><strong>Deskripsi:</strong> {{ $detail->alatCamping->description }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($detail->total_price, 0, ',', '.') }}</p>
            @if($detail->alatCamping->photo)
                <img src="{{ asset('storage/' . $detail->alatCamping->photo) }}" class="w-40 mt-2 rounded" alt="Foto Alat">
            @endif
        </div>
    </div>
    @else
        <p class="text-red-500">Detail alat tidak ditemukan.</p>
    @endif

    {{-- Tombol Aksi --}}
    @if($transaksi->status === 'pending')
        {{-- APPROVE FORM --}}
        <form method="POST" action="{{ route('user.pesanan.approve', $transaksi->id) }}" class="mt-4">
            @csrf
            <label class="block font-medium">Catatan (Opsional):</label>
            <textarea name="notes" rows="2" class="w-full p-2 border rounded mb-2" placeholder="Tulis catatan...">{{ old('notes') }}</textarea>
            
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Setujui Pesanan
            </button>
        </form>

        {{-- REJECT FORM --}}
        <form method="POST" action="{{ route('user.pesanan.reject', $transaksi->id) }}" class="mt-4">
            @csrf
            <label class="block font-medium">Catatan (Opsional):</label>
            <textarea name="notes" rows="2" class="w-full p-2 border rounded mb-2" placeholder="Tulis alasan penolakan...">{{ old('notes') }}</textarea>

            <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Tolak Pesanan
            </button>
        </form>
    @elseif($transaksi->status === 'menunggu_pengambilan')
        {{-- UBAH JADI DISEWA --}}
        <form method="POST" action="{{ route('user.pesanan.ubahSewa', $transaksi->id) }}" class="mt-4">
            @csrf
            <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Ubah Menjadi Disewa
            </button>
        </form>
    @elseif($transaksi->status === 'disewa')
        {{-- TANDAI SUDAH DIKEMBALIKAN --}}
        <form method="POST" action="{{ route('user.pesanan.kembalikan', $transaksi->id) }}" class="mt-4">
            @csrf
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Tandai Sudah Dikembalikan
            </button>
        </form>
    @endif

    <a href="{{ route('user.pesanan.kelola') }}" class="block mt-6 text-blue-600 hover:underline">
        ← Kembali ke Daftar Pesanan
    </a>
</div>
@endsection
