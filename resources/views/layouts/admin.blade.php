<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | CampEase Admin</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') <!-- Pastikan Tailwind sudah dikompilasi oleh Vite -->
</head>
<body class="bg-gray-50 text-gray-900">

    <nav class="bg-gradient-to-r from-stone-800 via-stone-900 to-stone-800 shadow-2xl border-b border-stone-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Logo Section -->
                <div class="flex items-center space-x-3">
                    <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-amber-400 to-amber-600 rounded-xl shadow-lg">
                        <ion-icon name="settings-outline" class="text-2xl text-white"></ion-icon>
                    </div>
                    <div>
                        <h1 class="text-2xl font-extrabold tracking-tight text-white">
                            Camp<span class="text-amber-400">Ease</span> Admin
                        </h1>
                        <div class="text-xs text-stone-400 font-medium tracking-wide">Manage Everything</div>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <div class="flex items-center space-x-6">
                    <a href="{{ route('admin.dashboard') }}"
                    class="group flex items-center space-x-2 text-stone-300 hover:text-amber-400 font-medium transition-all duration-300">
                        <ion-icon name="home-outline" class="text-xl group-hover:scale-110 transition-transform"></ion-icon>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.alat') }}"
                    class="group flex items-center space-x-2 text-stone-300 hover:text-amber-400 font-medium transition-all duration-300">
                        <ion-icon name="bag-check-outline" class="text-xl group-hover:scale-110 transition-transform"></ion-icon>
                        <span>Kelola Alat</span>
                    </a>
                    <a href="{{ route('admin.pesanan') }}"
                    class="group flex items-center space-x-2 text-stone-300 hover:text-amber-400 font-medium transition-all duration-300">
                        <ion-icon name="file-tray-full-outline" class="text-xl group-hover:scale-110 transition-transform"></ion-icon>
                        <span>Kelola Pesanan</span>
                    </a>
                    <a href="{{ route('admin.users') }}"
                    class="group flex items-center space-x-2 text-stone-300 hover:text-amber-400 font-medium transition-all duration-300">
                        <ion-icon name="people-outline" class="text-xl group-hover:scale-110 transition-transform"></ion-icon>
                        <span>Kelola User</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="group flex items-center space-x-2 text-stone-300 hover:text-red-400 font-medium transition-all duration-300">
                            <ion-icon name="log-out-outline" class="text-xl group-hover:scale-110 transition-transform"></ion-icon>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

</body>
</html>
