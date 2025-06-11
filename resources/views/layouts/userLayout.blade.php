<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div id="sidebar" class="w-64 bg-white shadow-lg min-h-screen hidden md:block">
            <div class="p-4 font-bold text-lg border-b">Menu</div>
            <ul class="p-4 space-y-2">
                <li><a href="{{ route('user.dashboard') }}" class="block">Etalase Alat</a></li>
                <li><a href="{{ route('user.kelola') }}" class="block">Kelola Alat</a></li>
                <li><a href="{{ route('user.profil') }}" class="block">Profile</a></li>
                {{-- @if($hasAlat)
                    <li><a href="{{ route('user.kelola') }}" class="block">Kelola Alat</a></li>
                @endif --}}
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-red-500">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="flex-1">
            <!-- Navbar -->
            <div class="bg-white shadow p-4 flex justify-between items-center">
                <button onclick="toggleSidebar()" class="md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div class="font-semibold text-lg">Dashboard</div>
                <div class="rounded-full w-8 h-8 bg-gray-300"></div>
            </div>

            <div class="p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        }
    </script>
</body>
</html>
