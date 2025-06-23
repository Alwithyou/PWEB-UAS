<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | CampEase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/js/register.js')
</head>
<body class="h-screen w-screen bg-gradient-to-br from-stone-800 via-stone-900 to-stone-800 flex items-center justify-center relative overflow-hidden">

    <!-- Background Image Layer (Blurred) -->
    <div class="absolute inset-0 bg-[url('/img/camping-bg.jpg')] bg-cover bg-center opacity-20 blur-sm z-0"></div>

    <!-- Register Card -->
    <form id="registerForm" class="relative z-10 backdrop-blur-md bg-white/10 border border-white/20 text-white p-8 rounded-2xl shadow-2xl w-full max-w-sm animate-fade-in">
        <h1 class="text-3xl font-bold mb-6 text-center">Daftar Akun</h1>

        <!-- Error Message -->
        <div id="errorMsg" class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 hidden text-sm"></div>

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium mb-1">Nama</label>
            <input type="text" name="name" id="name" placeholder="Nama Lengkap"
                class="w-full p-2 rounded bg-white/20 text-white placeholder-white/70 border border-white/30 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" id="email" placeholder="email@domain.com"
                class="w-full p-2 rounded bg-white/20 text-white placeholder-white/70 border border-white/30 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium mb-1">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••"
                class="w-full p-2 rounded bg-white/20 text-white placeholder-white/70 border border-white/30 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <!-- Password Confirmation -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••"
                class="w-full p-2 rounded bg-white/20 text-white placeholder-white/70 border border-white/30 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-green-500 hover:bg-green-600 transition-colors text-white py-2 rounded font-semibold shadow-md">
            Daftar
        </button>

        <!-- Link ke Login -->
        <p class="text-center text-sm mt-4">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-300 hover:underline">Login di sini</a>
        </p>
    </form>

    <!-- Animation CSS -->
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in {
            animation: fade-in 0.8s ease-out;
        }
    </style>
</body>
</html>
