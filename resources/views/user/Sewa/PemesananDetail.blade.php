<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pemesanan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/js/pemesananDetail.js')
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-semibold mb-6">Detail Pemesanan</h1>
        
        <!-- Kontainer detail pemesanan -->
        <div id="pemesanan-detail-container" data-id="{{ $id }}">
            <p class="text-gray-500">Memuat data detail pesanan...</p>
        </div>

        <!-- Form Upload Bukti -->
        <div id="upload-bukti-form" class="mt-6 hidden">
            <h3 class="text-lg font-semibold mb-2">Upload Bukti Pembayaran</h3>
            <form id="form-upload-bukti" enctype="multipart/form-data">
                <input type="file" name="bukti_pembayaran" accept="image/*" required
                       class="mb-2 block border border-gray-300 p-2 rounded w-full">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Upload
                </button>
            </form>
            <div id="upload-status" class="mt-2 text-sm text-green-600 hidden">Upload berhasil!</div>
        </div>

        <!-- Kembali -->
        <a href="{{ route('user.pemesananSaya') }}" class="text-blue-600 hover:underline mt-4 inline-block">← Kembali ke daftar pesanan</a>
    </div>
</body>
</html>
