<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Load Vite (otomatis termasuk Tailwind jika sudah dikonfigurasi di app.js) --}}
    @vite('resources/js/app.js')
    <script src="{{ asset('js/pemesananDetail.js') }}"></script>

</head>
<body class="bg-gray-100 text-gray-800">
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
                            Camping<span class="text-amber-400">Rent</span>
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
                            <span>Kelola Alat</span>
                        </a>
                    @endauth
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center space-x-4">
                    @auth
                        <!-- Profile -->
                        <a href="{{ route('user.profil') }}"
                           class="group relative w-12 h-12 rounded-full overflow-hidden border-3 border-amber-400 hover:border-amber-300 hover:scale-110 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <img src="{{ asset('images/profile-icon.png') }}" alt="Profil" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-amber-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
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

    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-xl shadow">
        <h2 class="text-2xl font-bold mb-4">Pemesanan Saya</h2>

        <!-- Kontainer pemesanan -->
        <div id="pemesanan-container">
            <p class="text-gray-500">Memuat data...</p>
        </div>
    </div>
    
</body>
</html>
