@if($alat->count() > 0)
    @foreach($alat as $item)
        <div onclick="window.location='{{ route('alat.detail', $item->id) }}'" class="cursor-pointer bg-white shadow rounded-lg p-4 flex flex-col hover:shadow-lg transition">
            @if($item->photo)
                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" class="w-full h-48 object-cover rounded mb-4">
            @endif
            <h4 class="text-lg font-semibold">{{ $item->name }}</h4>
            <p class="text-sm text-gray-600 mb-2 truncate">{{ $item->description }}</p>
            <p class="font-bold text-blue-600 mb-4">Rp{{ number_format($item->price_per_day, 0, ',', '.') }}/hari</p>

            @auth
                <a href="{{ route('alat.formSewa', $item->id) }}" class="mt-auto bg-blue-600 text-white px-4 py-2 rounded text-center">Pesan Sekarang</a>
            @else
                <p class="mt-auto text-red-500 text-sm">Login untuk memesan</p>
            @endauth
        </div>
    @endforeach
@else
    <p class="text-gray-500">Tidak ada alat tersedia saat ini.</p>
@endif
