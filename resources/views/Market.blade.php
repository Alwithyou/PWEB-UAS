<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Alat Camping</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/alatDashboard.js'])
</head>
<body class="bg-stone-50 text-stone-800 min-h-screen">
    
    <!-- Navbar -->
    <nav class="bg-stone-800 shadow-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <h1 class="text-2xl font-bold">
                    <span class="text-amber-400">⛺ Camp</span><span class="text-stone-100">Ease</span>
                </h1>
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('user.kelola') }}" 
                           class="text-stone-300 hover:text-amber-400 font-medium transition duration-300 px-4 py-2 rounded-lg hover:bg-stone-700">
                            Kelola Alat
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button class="text-stone-300 hover:text-red-400 font-medium transition duration-300 px-4 py-2 rounded-lg hover:bg-stone-700">
                            Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" 
                           class="bg-amber-600 text-white px-6 py-2 rounded-full hover:bg-amber-700 transition duration-300 font-medium shadow-lg">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-green-50 via-stone-50 to-amber-50 py-20 relative">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23065f46" fill-opacity="0.03"%3E%3Cpath d="M20 20c0-11.046-8.954-20-20-20s-20 8.954-20 20 8.954 20 20 20 20-8.954 20-20z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="mb-8">
                <div class="text-6xl mb-4">🏕️</div>
                <h2 class="text-4xl md:text-5xl font-bold text-stone-800 mb-6 leading-tight">
                    Sewa Alat Camping<br>
                    <span class="text-green-700">Berkualitas Tinggi</span>
                </h2>
                <p class="text-xl text-stone-600 max-w-3xl mx-auto leading-relaxed">
                    🌲 Temukan dan sewa berbagai perlengkapan camping terbaik dari sesama pecinta alam 🏔️
                </p>
            </div>
        </div>
    </section>

    <!-- Search Form -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-20">
        <div class="bg-white rounded-2xl shadow-2xl border border-stone-200 p-8">
            <div class="text-center mb-6">
                <h3 class="text-lg font-semibold text-stone-700 mb-2">🔍 Cari Peralatan Camping</h3>
                <p class="text-stone-500 text-sm">Temukan gear yang Anda butuhkan untuk petualangan selanjutnya</p>
            </div>
            <form id="searchForm" data-role="search" data-url="{{ route('user.dashboard') }}" class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1 relative">
                    <input type="text" 
                           name="search" 
                           placeholder="Masukkan nama alat camping..." 
                           class="w-full px-6 py-4 border-2 border-stone-200 rounded-xl focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-100 transition duration-300 text-stone-700 placeholder-stone-400">
                </div>
                <button type="submit" 
                        class="bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-4 rounded-xl font-semibold hover:from-green-700 hover:to-green-800 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    🔍 Cari Sekarang
                </button>
            </form>
        </div>
    </div>

    <!-- Produk Alat Camping -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20 mb-20">
    <!-- Container dengan fixed height -->
    <div class="bg-white rounded-xl shadow-lg border border-stone-200 p-6 min-h-[600px] relative">
        <div id="alatList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @include('partials.alatCard', ['alat' => $alat])
        </div>

        <!-- Empty State - akan muncul hanya jika tidak ada data -->
        @if($alat->isEmpty())
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center opacity-80">
            <div class="text-6xl mb-4">🏕️</div>
        </div>
        @endif
    </div>
</div>
    <!-- Features Section -->
    <section class="bg-stone-800 py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-white mb-4">
                    🌟 Mengapa Pilih CampingRent?
                </h3>
                <p class="text-stone-300 text-lg">Komitmen kami untuk petualangan camping terbaik Anda</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center bg-stone-700 rounded-2xl p-8 hover:bg-stone-600 transition duration-300">
                    <div class="text-4xl mb-4">🛡️</div>
                    <h4 class="text-xl font-semibold text-white mb-3">Kualitas Terjamin</h4>
                    <p class="text-stone-300">Semua peralatan telah melalui inspeksi ketat untuk memastikan keamanan dan kenyamanan Anda</p>
                </div>
                <div class="text-center bg-stone-700 rounded-2xl p-8 hover:bg-stone-600 transition duration-300">
                    <div class="text-4xl mb-4">💰</div>
                    <h4 class="text-xl font-semibold text-white mb-3">Harga Terjangkau</h4>
                    <p class="text-stone-300">Nikmati pengalaman camping premium dengan harga yang ramah di kantong</p>
                </div>
                <div class="text-center bg-stone-700 rounded-2xl p-8 hover:bg-stone-600 transition duration-300">
                    <div class="text-4xl mb-4">🤝</div>
                    <h4 class="text-xl font-semibold text-white mb-3">Komunitas Terpercaya</h4>
                    <p class="text-stone-300">Bergabung dengan komunitas pecinta alam yang saling berbagi dan mendukung</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-stone-900 border-t border-stone-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center">
                <div class="mb-6">
                    <h4 class="text-2xl font-bold mb-2">
                        <span class="text-amber-400">⛺ Camp</span><span class="text-stone-100">Ease</span>
                    </h4>
                    <p class="text-stone-400">🌲 Petualangan dimulai dari sini 🏔️</p>
                </div>
                <div class="border-t border-stone-700 pt-6">
                    <p class="text-stone-500">
                        &copy; {{ date('Y') }} CampingRent. Semua hak dilindungi. 
                        <span class="mx-2">•</span>
                        Dibuat dengan ❤️ untuk para petualang Indonesia
                    </p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>