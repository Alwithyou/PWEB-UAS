@extends('layouts.userlayout')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded-xl shadow-md mt-10">
    <h2 class="text-xl font-bold mb-4">Form Sewa Alat</h2>

    <form action="{{ route('alat.prosesSewa', $alat->id) }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="start_date" class="block font-semibold">Tanggal Mulai:</label>
            <input type="date" id="start_date" name="start_date" class="mt-1 w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="block font-semibold">Tanggal Selesai:</label>
            <input type="date" id="end_date" name="end_date" class="mt-1 w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="address" class="block font-semibold">Alamat Pengantaran:</label>
            <textarea id="address" name="address" class="mt-1 w-full border rounded px-3 py-2" required>{{ old('address') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Harga per Hari:</label>
            <p class="text-gray-700">Rp {{ number_format($alat->price_per_day, 0, ',', '.') }}</p>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Total Harga:</label>
            <p id="total_price_display" class="text-green-600 font-bold">Rp 0</p>
        </div>

        <input type="hidden" id="price_per_day" value="{{ $alat->price_per_day }}">

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Ajukan Sewa</button>
    </form>
</div>

{{-- Script untuk menghitung total harga --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const startInput = document.getElementById('start_date');
        const endInput = document.getElementById('end_date');
        const pricePerDay = parseFloat(document.getElementById('price_per_day').value);
        const totalDisplay = document.getElementById('total_price_display');

        function updateTotalPrice() {
            const start = new Date(startInput.value);
            const end = new Date(endInput.value);

            if (startInput.value && endInput.value && end >= start) {
                const days = Math.floor((end - start) / (1000 * 60 * 60 * 24)) + 1;
                const total = days * pricePerDay;

                totalDisplay.textContent = 'Rp ' + total.toLocaleString('id-ID');
            } else {
                totalDisplay.textContent = 'Rp 0';
            }
        }

        startInput.addEventListener('change', updateTotalPrice);
        endInput.addEventListener('change', updateTotalPrice);
    });
</script>
@endsection
