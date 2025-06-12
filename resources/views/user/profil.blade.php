@extends('layouts.userlayout')

@section('title', 'Profil Pengguna')

@section('content')
<!-- CDN Iconify for Iconicons -->
<script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>

<div class="max-w-xl mx-auto mt-10 px-6">
  <div class="bg-white shadow-xl rounded-2xl p-6">
    <h2 class="text-2xl font-semibold text-center mb-6 flex items-center justify-center gap-2">
      <iconify-icon icon="icon-park-outline:user" class="text-gray-700 text-2xl"></iconify-icon>
      Profil Pengguna
    </h2>

    @if (session('success'))
      <div class="bg-green-100 text-green-800 text-sm font-medium px-4 py-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <div class="space-y-4">
      <div class="flex items-center gap-3">
        <iconify-icon icon="icon-park-outline:people" class="text-gray-600 text-xl"></iconify-icon>
        <p class="text-gray-700"><span class="font-semibold">Nama:</span> {{ $user->name }}</p>
      </div>
      <div class="flex items-center gap-3">
        <iconify-icon icon="icon-park-outline:mail" class="text-gray-600 text-xl"></iconify-icon>
        <p class="text-gray-700"><span class="font-semibold">Email:</span> {{ $user->email }}</p>
      </div>
      <div class="flex items-center gap-3">
        <iconify-icon icon="icon-park-outline:phone" class="text-gray-600 text-xl"></iconify-icon>
        <p class="text-gray-700"><span class="font-semibold">Nomor HP:</span> {{ $user->phone ?? 'Belum diisi' }}</p>
      </div>
    </div>

    <div class="mt-6 grid grid-cols-2 gap-4">
      <a href="{{ route('user.profil.edit') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-4 rounded-lg transition">
        <iconify-icon icon="icon-park-outline:edit" class="inline-block mr-2 text-xl"></iconify-icon>Edit Profil
      </a>
      <a href="{{ route('user.dashboard') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 text-center py-2 px-4 rounded-lg transition">
        <iconify-icon icon="icon-park-outline:home" class="inline-block mr-2 text-xl"></iconify-icon>Kembali
      </a>
    </div>
  </div>
</div>
@endsection
