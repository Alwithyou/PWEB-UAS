<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Alat Camping</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    @vite(['resources/js/alatDashboard.js'])
</head>
<body class="bg-stone-50 text-stone-800 min-h-screen">
    
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-stone-800 via-stone-900 to-stone-800 shadow-2xl border-b border-stone-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Logo Section -->
                <div class="flex-shrink-0 flex items-center space-x-3">
                    <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-amber-400 to-amber-600 rounded-xl shadow-lg">
                        <ion-icon name="earth-outline" class="text-2xl text-white"></ion-icon>
                    </div>
                    <div>
                        <h1 class="text-2xl font-extrabold tracking-tight text-white">
                            Camp<span class="text-amber-400">Ease</span>
                        </h1>
                        <div class="text-xs text-stone-400 font-medium tracking-wide">Adventure Starts Here</div>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <div class="hidden md:flex items-center space-x-2">
                    @auth
                        <!-- Market -->
                        <a href="{{ route('user.dashboard') }}"
                           class="group flex items-center space-x-2 text-stone-300 hover:text-amber-400 font-medium transition-all duration-300 px-4 py-3 rounded-xl hover:bg-stone-700/50 hover:shadow-lg transform hover:-translate-y-0.5">
                            <ion-icon name="storefront-outline" class="text-xl group-hover:scale-110 transition-transform duration-300"></ion-icon>
                            <span>Market</span>
                        </a>

                        <!-- Pesanan -->
                       <a href="{{ route('user.pemesananSaya') }}"
                           class="group flex items-center space-x-2 text-stone-300 hover:text-amber-400 font-medium transition-all duration-300 px-4 py-3 rounded-xl hover:bg-stone-700/50 hover:shadow-lg transform hover:-translate-y-0.5">
                            <ion-icon name="cube-outline" class="text-xl group-hover:scale-110 transition-transform duration-300"></ion-icon>
                            <span>Pesanan</span>
                        </a>

                        <!-- Kelola Alat -->
                        <a href="{{ route('user.kelola') }}"
                           class="group flex items-center space-x-2 text-stone-300 hover:text-amber-400 font-medium transition-all duration-300 px-4 py-3 rounded-xl hover:bg-stone-700/50 hover:shadow-lg transform hover:-translate-y-0.5">
                            <ion-icon name="bag-outline" class="text-xl group-hover:scale-110 transition-transform duration-300"></ion-icon>
                            <span>Kelola Rental</span>
                        </a>
                    @endauth
                </div>
                    <!-- Right Side Actions -->
                    <div class="flex items-center space-x-4">
                        @auth
                            <!-- Profile -->
                            <a href="{{ route('user.profil') }}"
                            class="group flex items-center justify-center w-12 h-12 rounded-full border-2 border-amber-400 hover:border-amber-300 hover:scale-110 transition-all duration-300 bg-stone-700 shadow-lg hover:shadow-xl">
                                <ion-icon name="person-circle-outline" class="text-3xl text-white group-hover:text-amber-400 transition duration-300"></ion-icon>
                            </a>

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="group flex items-center space-x-2 text-stone-300 hover:text-red-400 font-medium transition-all duration-300 px-4 py-3 rounded-xl hover:bg-red-900/20 hover:shadow-lg transform hover:-translate-y-0.5 border border-transparent hover:border-red-400/30">
                                    <ion-icon name="log-out-outline" class="text-xl group-hover:scale-110 transition-transform duration-300"></ion-icon>
                                    <span class="hidden sm:inline">Logout</span>
                                </button>
                            </form>
                        @else
                            <!-- Login Button -->
                            <a href="{{ route('login') }}"
                            class="group flex items-center space-x-2 bg-gradient-to-r from-amber-600 to-amber-700 text-white px-6 py-3 rounded-full hover:from-amber-700 hover:to-amber-800 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 border border-amber-500/30">
                                <ion-icon name="key-outline" class="text-xl group-hover:scale-110 transition-transform duration-300"></ion-icon>
                                <span>Login</span>
                            </a>
                        @endauth
                    </div>


                    <!-- Mobile Menu Button (for responsive) -->
                    <button class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg text-stone-300 hover:text-amber-400 hover:bg-stone-700/50 transition-all duration-300">
                        <ion-icon name="menu-outline" class="text-2xl"></ion-icon>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu (hidden by default) -->
            <div class="md:hidden border-t border-stone-700 py-4">
                @auth
                    <div class="flex flex-col space-y-2">
                        <a href="{{ route('user.dashboard') }}"
                           class="flex items-center space-x-3 text-stone-300 hover:text-amber-400 font-medium transition-all duration-300 px-4 py-3 rounded-lg hover:bg-stone-700/50">
                            <ion-icon name="storefront-outline" class="text-xl"></ion-icon>
                            <span>Market</span>
                        </a>
                        <a href="{{ route('user.profil') }}"
                           class="flex items-center space-x-3 text-stone-300 hover:text-amber-400 font-medium transition-all duration-300 px-4 py-3 rounded-lg hover:bg-stone-700/50">
                            <ion-icon name="cube-outline" class="text-xl"></ion-icon>
                            <span>Pesanan</span>
                        </a>
                        <a href="{{ route('user.kelola') }}"
                           class="flex items-center space-x-3 text-stone-300 hover:text-amber-400 font-medium transition-all duration-300 px-4 py-3 rounded-lg hover:bg-stone-700/50">
                            <ion-icon name="bag-outline" class="text-xl"></ion-icon>
                            <span>Kelola Alat</span>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-green-50 via-stone-50 to-amber-50 py-20 relative">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23065f46" fill-opacity="0.03"%3E%3Cpath d="M20 20c0-11.046-8.954-20-20-20s-20 8.954-20 20 8.954 20 20 20 20-8.954 20-20z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="mb-8">
                <div class="flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-600 to-green-700 rounded-full mx-auto mb-4 shadow-lg">
                    <ion-icon name="leaf-outline" class="text-4xl text-white"></ion-icon>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-stone-800 mb-6 leading-tight">
                    Sewa Alat Camping<br>
                    <span class="text-green-700">Berkualitas Tinggi</span>
                </h2>
                <p class="text-xl text-stone-600 max-w-3xl mx-auto leading-relaxed flex items-center justify-center gap-2">
                    <ion-icon name="leaf-outline" class="text-green-600"></ion-icon>
                    <span>Temukan dan sewa berbagai perlengkapan camping terbaik dari sesama pecinta alam</span>
                    <ion-icon name="mountain-outline" class="text-green-600"></ion-icon>
                </p>
            </div>
        </div>
    </section>

    <!-- Search Form -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-20">
        <div class="bg-white rounded-2xl shadow-2xl border border-stone-200 p-8">
            <div class="text-center mb-6">
                <div class="flex items-center justify-center space-x-2 mb-2">
                    <ion-icon name="search-outline" class="text-2xl text-green-600"></ion-icon>
                    <h3 class="text-lg font-semibold text-stone-700">Cari Peralatan Camping</h3>
                </div>
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
                        class="bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-4 rounded-xl font-semibold hover:from-green-700 hover:to-green-800 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center space-x-2">
                    <ion-icon name="search-outline" class="text-xl"></ion-icon>
                    <span>Cari Sekarang</span>
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
                <div class="flex items-center justify-center w-24 h-24 bg-gradient-to-br from-stone-200 to-stone-300 rounded-full mb-4">
                    <ion-icon name="leaf-outline" class="text-4xl text-stone-600"></ion-icon>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- Features Section -->
    <section class="bg-stone-800 py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="flex items-center justify-center space-x-2 mb-4">
                    <ion-icon name="star-outline" class="text-3xl text-amber-400"></ion-icon>
                    <h3 class="text-3xl font-bold text-white">Mengapa Pilih CampEase?</h3>
                </div>
                <p class="text-stone-300 text-lg">Komitmen kami untuk petualangan camping terbaik Anda</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center bg-stone-700 rounded-2xl p-8 hover:bg-stone-600 transition duration-300">
                    <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl mx-auto mb-4">
                        <ion-icon name="shield-checkmark-outline" class="text-3xl text-white"></ion-icon>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-3">Kualitas Terjamin</h4>
                    <p class="text-stone-300">Semua peralatan telah melalui inspeksi ketat untuk memastikan keamanan dan kenyamanan Anda</p>
                </div>
                <div class="text-center bg-stone-700 rounded-2xl p-8 hover:bg-stone-600 transition duration-300">
                    <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl mx-auto mb-4">
                        <ion-icon name="wallet-outline" class="text-3xl text-white"></ion-icon>
                    </div>
                    <h4 class="text-xl font-semibold text-white mb-3">Harga Terjangkau</h4>
                    <p class="text-stone-300">Nikmati pengalaman camping premium dengan harga yang ramah di kantong</p>
                </div>
                <div class="text-center bg-stone-700 rounded-2xl p-8 hover:bg-stone-600 transition duration-300">
                    <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl mx-auto mb-4">
                        <ion-icon name="people-outline" class="text-3xl text-white"></ion-icon>
                    </div>
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
                <div class="mb-6 flex items-center justify-center space-x-3">
                    <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-amber-400 to-amber-600 rounded-xl shadow-lg">
                        <ion-icon name="earth-outline" class="text-2xl text-white"></ion-icon>
                    </div>
                    <h4 class="text-2xl font-bold text-white">
                        Camp<span class="text-amber-400">Ease</span>
                    </h4>
                </div>
                <p class="text-stone-400 flex items-center justify-center space-x-2">
                    <ion-icon name="leaf-outline" class="text-green-400"></ion-icon>
                    <span>Petualangan dimulai dari sini</span>
                    <ion-icon name="mountain-outline" class="text-green-400"></ion-icon>
                </p>
                <div class="border-t border-stone-700 pt-6">
                    <p class="text-stone-500 flex items-center justify-center space-x-2">
                        <span>&copy; {{ date('Y') }} CampEase. Semua hak dilindungi.</span>
                        <span class="mx-2">•</span>
                        <span>Dibuat dengan</span>
                        <ion-icon name="heart" class="text-red-500"></ion-icon>
                        <span>untuk para petualang Indonesia</span>
                    </p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>