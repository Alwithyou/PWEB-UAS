<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Pemilik')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>
<body class="bg-gray-100 text-stone-100">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside id="sidebar" class="w-64 bg-gradient-to-br from-stone-800 via-stone-900 to-stone-800 shadow-xl hidden md:block">
        <div class="p-6 border-b border-stone-700">
            <h2 class="text-2xl font-bold text-white">CampEase</h2>
            <p class="text-sm text-stone-400 mt-1">Pemilik Menu</p>
        </div>

        <nav class="p-4 space-y-2">
            <a href="{{ route('user.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg text-stone-300 hover:text-amber-400 hover:bg-stone-700/50 transition">
                <iconify-icon icon="mdi:storefront-outline" class="w-5 h-5 mr-3 text-stone-400 group-hover:text-amber-400"></iconify-icon>
                <span>Market</span>
            </a>

            <a href="{{ route('user.kelola') }}" class="flex items-center px-4 py-3 rounded-lg text-stone-300 hover:text-amber-400 hover:bg-stone-700/50 transition">
                <iconify-icon icon="mdi:toolbox-outline" class="w-5 h-5 mr-3 text-stone-400"></iconify-icon>
                <span>Kelola Alat</span>
            </a>

            <a href="{{ route('user.pesanan.kelola') }}" class="flex items-center px-4 py-3 rounded-lg text-stone-300 hover:text-amber-400 hover:bg-stone-700/50 transition">
                <iconify-icon icon="mdi:clipboard-text-outline" class="w-5 h-5 mr-3 text-stone-400"></iconify-icon>
                <span>Kelola Pesanan</span>
            </a>

            <form method="POST" action="{{ route('logout') }}" class="pt-4 border-t border-stone-700 mt-4">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-3 text-red-300 hover:text-red-400 hover:bg-red-900/20 rounded-lg transition">
                    <iconify-icon icon="mdi:logout" class="w-5 h-5 mr-3"></iconify-icon>
                    <span>Logout</span>
                </button>
            </form>
        </nav>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">

        {{-- Top Navbar --}}
        <header class="bg-gradient-to-r from-stone-800 via-stone-900 to-stone-800 border-b border-stone-700 shadow">
            <div class="flex justify-between items-center px-6 py-4">
                <h1 class="text-xl font-semibold text-white">Kelola Rental</h1>
            </div>
        </header>

        {{-- Content Area --}}
        <main class="flex-1 p-6 bg-gray-100 text-gray-800">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>
</div>

</body>
</html>
