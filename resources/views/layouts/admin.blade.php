<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | CampEase Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') <!-- Pastikan Tailwind sudah dikompilasi oleh Vite -->
</head>
<body class="bg-gray-50 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-gradient-to-b from-green-800 to-green-600 text-white px-4 py-3 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-semibold">CampEase Admin</a>
            <ul class="flex items-center space-x-6">
                <li>
                    <a href="/admin/alat" class="hover:underline">Kelola Alat</a>
                </li>
                <li>
                    <a href="/admin/pesanan" class="hover:underline">Kelola Pesanan</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Kelola User</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:underline">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

</body>
</html>
