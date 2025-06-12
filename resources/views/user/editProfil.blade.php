@extends('layouts.userlayout')

@section('title', 'Edit Profil')

@section('content')
<!-- CDN Iconify for Iconicons -->
<script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>

<div class="max-w-xl mx-auto mt-10 px-6">
  <div class="bg-white shadow-xl rounded-2xl p-6">
    <h2 class="text-2xl font-semibold text-center mb-6 flex items-center justify-center gap-2">
      <iconify-icon icon="icon-park-outline:edit" class="text-gray-700 text-2xl"></iconify-icon>
      Edit Profil
    </h2>

    <form action="{{ route('user.profil.update') }}" method="POST" class="space-y-4">
      @csrf
      @method('PUT')

      <div>
        <label for="name" class="block text-gray-700 font-medium mb-1">Nama Lengkap</label>
        <input type="text" name="name" id="name" required
               value="{{ old('name', $user->name) }}"
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
        <input type="email" name="email" id="email" required
               value="{{ old('email', $user->email) }}"
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label for="phone" class="block text-gray-700 font-medium mb-1">Nomor HP</label>
        <input type="text" name="phone" id="phone"
               value="{{ old('phone', $user->phone) }}"
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div class="flex justify-between mt-6">
        <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition">
          <iconify-icon icon="icon-park-outline:check" class="inline-block mr-1 text-xl"></iconify-icon>
          Simpan
        </button>

        <a href="{{ route('user.profil') }}"
           class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition">
          <iconify-icon icon="icon-park-outline:close" class="inline-block mr-1 text-xl"></iconify-icon>
          Batal
        </a>
      </div>
    </form>
  </div>
</div>
@endsection
