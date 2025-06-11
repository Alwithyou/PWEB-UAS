@extends('layouts.userlayout')

@section('content')
<div class="max-w-xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Alat Camping</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.alat.simpan') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-medium">Nama Alat</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="description" class="block font-medium">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div>
            <label for="price_per_day" class="block font-medium">Harga per Hari (Rp)</label>
            <input type="number" name="price_per_day" id="price_per_day" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="photo" class="block font-medium">Foto Alat</label>
            <input type="file" name="photo" id="photo" class="w-full border rounded px-3 py-2" accept="image/*">
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
