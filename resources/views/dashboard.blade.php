<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10">
    <h1 class="text-2xl font-bold">Halo, {{ auth()->user()->name }}</h1>
    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf
        <button type="submit" class="bg-red-500 px-4 py-2 text-white rounded">Logout</button>
    </form>
</body>
</html>
