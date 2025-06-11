<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Email</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-6 rounded shadow-md w-full max-w-md text-center">
        <h1 class="text-xl font-bold mb-4">Verifikasi Email Anda</h1>
        <p class="mb-4">Kami telah mengirim link verifikasi ke email Anda. Silakan periksa kotak masuk Anda.</p>

        @if (session('message'))
            <div class="text-green-600 mb-4">{{ session('message') }}</div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Kirim Ulang Email Verifikasi
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button class="text-red-500 text-sm">Logout</button>
        </form>
    </div>
</body>
</html>
