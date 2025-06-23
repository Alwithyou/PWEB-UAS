<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
</head>
<body class="bg-gradient-to-br from-stone-900 via-stone-800 to-stone-900 text-white min-h-screen flex items-center justify-center px-4 py-10">

    <div class="w-full max-w-2xl bg-white text-stone-800 shadow-2xl rounded-3xl p-8 border border-stone-300">
        <!-- Header -->
        <div class="flex items-center justify-center gap-3 mb-6">
            <div class="bg-gradient-to-tr from-amber-400 to-amber-600 p-3 rounded-full shadow-lg">
                <iconify-icon icon="icon-park-outline:user" class="text-white text-2xl"></iconify-icon>
            </div>
            <h2 class="text-2xl font-bold tracking-tight text-stone-800">Profil Pengguna</h2>
        </div>

        <!-- Notifikasi sukses -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 text-sm font-medium px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Info Profil -->
        <div class="space-y-4 text-sm sm:text-base">
            <div class="flex items-center gap-3">
                <iconify-icon icon="icon-park-outline:people" class="text-amber-500 text-xl"></iconify-icon>
                <p><span class="font-semibold text-stone-700">Nama:</span> {{ $user->name }}</p>
            </div>
            <div class="flex items-center gap-3">
                <iconify-icon icon="icon-park-outline:mail" class="text-amber-500 text-xl"></iconify-icon>
                <p><span class="font-semibold text-stone-700">Email:</span> {{ $user->email }}</p>
            </div>
            <div class="flex items-center gap-3">
                <iconify-icon icon="icon-park-outline:phone" class="text-amber-500 text-xl"></iconify-icon>
                <p><span class="font-semibold text-stone-700">Nomor HP:</span> {{ $user->phone ?? 'Belum diisi' }}</p>
            </div>
            <div class="flex items-start gap-3">
                <iconify-icon icon="icon-park-outline:map" class="text-amber-500 text-xl mt-1"></iconify-icon>
                <p><span class="font-semibold text-stone-700">Alamat:</span> {{ $user->address ?? 'Belum diisi' }}</p>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('user.profil.edit') }}"
               class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white text-center py-2 rounded-lg transition font-semibold shadow-md hover:shadow-xl">
                <iconify-icon icon="icon-park-outline:edit" class="inline-block mr-2 text-xl"></iconify-icon>Edit Profil
            </a>
            <a href="{{ route('user.dashboard') }}"
               class="bg-gradient-to-r from-stone-200 to-stone-300 hover:from-stone-300 hover:to-stone-400 text-stone-800 text-center py-2 rounded-lg transition font-semibold shadow-md hover:shadow-xl">
                <iconify-icon icon="icon-park-outline:home" class="inline-block mr-2 text-xl"></iconify-icon>Kembali
            </a>
        </div>
    </div>

</body>
</html>
