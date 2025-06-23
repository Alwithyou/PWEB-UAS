<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/register.js') {{-- pastikan file ini benar --}}
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form id="registerForm" class="bg-white p-8 rounded shadow-md w-full max-w-sm">
        <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>

        <div id="errorMsg" class="bg-red-100 text-red-600 px-4 py-2 rounded mb-4 hidden"></div>

        <input type="text" name="name" placeholder="Nama" class="w-full mb-4 p-2 border rounded" required>
        <input type="email" name="email" placeholder="Email" class="w-full mb-4 p-2 border rounded" required>
        <input type="password" name="password" placeholder="Password" class="w-full mb-4 p-2 border rounded" required>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="w-full mb-4 p-2 border rounded" required>

        <button type="submit" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">Daftar</button>
        <p class="text-center text-sm mt-4">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500">Login</a></p>
    </form>
</body>
</html>
