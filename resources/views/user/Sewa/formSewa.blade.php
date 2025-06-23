<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Alat - CampingRent</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    @vite('resources/js/formSewa.js')
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
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
    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            
            <!-- Header Section -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Form Sewa Alat</h1>
                <p class="text-gray-600">Isi formulir di bawah untuk mengajukan sewa alat camping</p>
            </div>

            <!-- Notification Area -->
            <div id="notif-area" class="mb-6"></div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white">Detail Sewa</h2>
                </div>
                
                <div class="p-6">
                    <form id="form-sewa" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <input type="hidden" name="alat_id" value="{{ $alat->id }}">
                        <input type="hidden" id="price_per_day" value="{{ $alat->price_per_day }}">

                        <!-- Date Selection Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Tanggal Mulai
                                </label>
                                <input type="date" 
                                       name="start_date" 
                                       id="start_date" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                       required>
                            </div>
                            
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Tanggal Selesai
                                </label>
                                <input type="date" 
                                       name="end_date" 
                                       id="end_date" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                       required>
                            </div>
                        </div>

                        <!-- Address Field -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                Alamat Lengkap
                            </label>
                            <input type="text" 
                                   name="address" 
                                   placeholder="Masukkan alamat lengkap untuk pengiriman"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200" 
                                   required>
                        </div>

                        <!-- Identity Photo Upload -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                Foto Identitas (KTP/SIM)
                            </label>
                            <div class="relative">
                                <input type="file" 
                                       name="identity_photo" 
                                       accept="image/*"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" 
                                       required>
                            </div>
                            <p class="text-xs text-gray-500">
                                Upload foto KTP atau SIM untuk verifikasi identitas
                            </p>
                        </div>

                        <!-- Price Display -->
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-medium text-gray-700">Total Harga:</span>
                                <span id="total_price_display" class="text-xl font-bold text-blue-600">Rp 0</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">
                                Harga akan dihitung otomatis berdasarkan durasi sewa
                            </p>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 px-4 rounded-lg font-medium hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 ease-in-out transform hover:scale-105">
                                <span class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Ajukan Sewa
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 bg-blue-50 rounded-lg p-4 border border-blue-200">
                <h3 class="font-medium text-blue-900 mb-2">Informasi Penting:</h3>
                <ul class="text-sm text-blue-800 space-y-1">
                    <li>• Pastikan tanggal sewa sesuai dengan kebutuhan Anda</li>
                    <li>• Foto identitas diperlukan untuk verifikasi</li>
                    <li>• Alamat harus lengkap untuk memudahkan pengiriman</li>
                    <li>• Konfirmasi sewa akan dikirim melalui email/WhatsApp</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="text-center text-gray-600">
                <p>&copy; 2025 CampEase. Semua hak dilindungi undang-undang.</p>
            </div>
        </div>
    </footer>

</body>
</html>