<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-4">Dashboard Admin</h1>
        <p class="text-lg">Selamat datang, {{ Auth::user()->name }} (Admin)!</p>
        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button class="bg-red-500 text-white px-4 py-2 rounded" type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
