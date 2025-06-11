<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded shadow-md w-full max-w-sm">
        @csrf
        <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>

        @error('email')
            <div class="bg-red-100 text-red-600 px-4 py-2 rounded mb-4">{{ $message }}</div>
        @enderror

        <input type="email" name="email" placeholder="Email" class="w-full mb-4 p-2 border rounded" required>
        <input type="password" name="password" placeholder="Password" class="w-full mb-4 p-2 border rounded" required>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Login</button>
        <p class="text-center text-sm mt-4">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500">Daftar</a></p>
    </form>
</body>
</html>
