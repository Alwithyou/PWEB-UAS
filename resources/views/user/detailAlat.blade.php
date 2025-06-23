<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail {{ $alat->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body class="bg-gray-100 min-h-screen">

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
    

    <!-- Main Content -->
    <div class="max-w-2xl mx-auto px-4 py-6">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">

            <!-- Hero Image -->
            <div class="relative">
                <img src="{{ asset('storage/' . $alat->photo) }}" alt="{{ $alat->name }}" class="w-full h-64 sm:h-72 object-cover hover:scale-105 transition-transform duration-300">
            </div>

            <!-- Detail Content -->
            <div class="p-6">
                <div class="mb-5">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3">{{ $alat->name }}</h1>
                    <div class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md">
                        <span class="text-lg font-semibold">
                            Rp{{ number_format($alat->price_per_day, 0, ',', '.') }}
                        </span>
                        <span class="text-blue-100 ml-1">/hari</span>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-2">Deskripsi</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $alat->description }}</p>
                </div>
                <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-gray-400 rounded-full flex items-center justify-center">
                            <i class="bi bi-person-circle text-white text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-semibold">Pemilik</p>
                            <p class="text-lg font-bold text-gray-900">{{ $alat->pengguna->name }}</p>
                            <p class="text-sm text-gray-700"><i class="bi bi-envelope-fill mr-1 text-blue-500"></i> {{ $alat->pengguna->email }}</p>
                            <p class="text-sm text-gray-700"><i class="bi bi-geo-alt-fill mr-1 text-red-500"></i> {{ $alat->pengguna->address }}</p>
                        </div>
                    </div>
                </div>


                <!-- Aksi -->
                <div class="mb-4">
                    @auth
                        @if (auth()->id() !== $alat->pengguna_id)
                            <a href="{{ route('alat.formSewa', $alat->id) }}"
                               class="w-full inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                                <i class="bi bi-calendar3 text-lg mr-2"></i> Sewa Sekarang
                            </a>
                        @else
                            <p class="text-center text-sm text-red-600 font-semibold">
                                Ini barang milik Anda.
                            </p>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                           class="w-full inline-flex items-center justify-center px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition">
                            <i class="bi bi-box-arrow-in-right text-lg mr-2"></i> Login untuk Sewa
                        </a>
                    @endauth
                </div>

                <div class="pt-4 border-t border-gray-200">
                    <button onclick="goBack()" class="w-full inline-flex items-center justify-center px-4 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg transition-all duration-200">
                        <i class="bi bi-arrow-left text-lg mr-2"></i> Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                window.location.href = "{{ route('user.dashboard') }}";
            }
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                goBack();
            }
        });
    </script>
</body>
</html>
