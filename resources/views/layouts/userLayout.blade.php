<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform -translate-x-full transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:inset-0">
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">MENU</h2>
            </div>

            <nav class="p-4">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('user.dashboard') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200 group">
                            <iconify-icon icon="mdi:storefront-outline" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-500"></iconify-icon>
                            <span class="font-medium">Market</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.kelola') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200 group">
                            <iconify-icon icon="mdi:toolbox-outline" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-500"></iconify-icon>
                            <span class="font-medium">Kelola Alat</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.pesanan.kelola') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200 group">
                            <iconify-icon icon="mdi:clipboard-text-outline" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-500"></iconify-icon>
                            <span class="font-medium">Kelola Pesanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.profil') }}" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200 group">
                            <iconify-icon icon="mdi:account-outline" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-500"></iconify-icon>
                            <span class="font-medium">Profile</span>
                        </a>
                    </li>
                </ul>

                <div class="mt-8 pt-4 border-t border-gray-200">
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-3 text-red-600 rounded-lg hover:bg-red-50 transition-colors duration-200 group">
                        <iconify-icon icon="mdi:logout" class="w-5 h-5 mr-3"></iconify-icon>
                        <span class="font-medium">Logout</span>
                    </button>
                    </form>
                </div>
            </nav>
        </div>

        <div class="flex-1 flex flex-col md:ml-0">
            <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center">
                <h1 class="ml-2 md:ml-0 text-2xl font-semibold text-gray-800">CampEase</h1>
                </div>

                <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-50 transition-colors">
                    <span class="hidden sm:block text-sm font-medium text-gray-700">User</span>
                    </button>
                </div>
                </div>
            </div>
            </header>

            <main class="flex-1 p-6 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
            </main>
        </div>
    </div>

</body>
</html>
