@extends('layouts.userlayout')

@section('content')
<div class="max-w-xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Alat Camping</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.alat.update', $alat->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Nama Alat</label>
            <input type="text" name="name" value="{{ old('name', $alat->name) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full border rounded px-3 py-2">{{ old('description', $alat->description) }}</textarea>
        </div>

        <div>
            <label class="block font-medium">Harga per Hari (Rp)</label>
            <input type="number" name="price_per_day" value="{{ old('price_per_day', $alat->price_per_day) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Foto Alat</label>
            @if ($alat->photo)
                <img src="{{ asset('storage/' . $alat->photo) }}" class="h-32 mb-2 rounded">
            @endif
            <input type="file" name="photo" class="w-full border rounded px-3 py-2">
        </div>

        <div class="text-right">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Perbarui</button>
        </div>
    </form>
</div>
@endsection
