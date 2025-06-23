document.addEventListener('DOMContentLoaded', function () {
    fetch('/user/pemesanan-saya/data')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('pemesanan-container');
            container.innerHTML = ''; // Kosongkan kontainer

            if (data.length === 0) {
                container.innerHTML = '<p class="text-gray-500">Belum ada pemesanan.</p>';
                return;
            }

            data.forEach(pesanan => {
                const card = document.createElement('div');
                card.className = 'p-4 mb-4 bg-gray-100 rounded-xl shadow hover:shadow-md transition cursor-pointer hover:bg-gray-200';
                
                const statusColor = getStatusColor(pesanan.status);

                card.innerHTML = `
                    <h3 class="text-lg font-semibold mb-1 text-gray-800">${pesanan.nama_alat}</h3>
                    <p class="text-sm text-gray-700"><strong>Tanggal Sewa:</strong> ${pesanan.tanggal_mulai} s/d ${pesanan.tanggal_selesai}</p>
                    <p class="text-sm mt-1"><strong>Status:</strong> 
                        <span class="inline-block px-2 py-1 text-white text-xs rounded ${statusColor}">
                            ${pesanan.status}
                        </span>
                    </p>
                `;

                // Navigasi ke detail pesanan saat diklik
                card.addEventListener('click', () => {
                    window.location.href = `/user/pemesanan/detail/${pesanan.id}`;
                });

                container.appendChild(card);
            });
        })
        .catch(error => {
            const container = document.getElementById('pemesanan-container');
            container.innerHTML = '<p class="text-red-500">Gagal memuat data.</p>';
            console.error('Error:', error);
        });
});

function getStatusColor(status) {
    switch (status.toLowerCase()) {
        case 'pending': return 'bg-yellow-500';
        case 'approved': return 'bg-green-500';
        case 'rejected': return 'bg-red-500';
        case 'menunggu_pembayaran': return 'bg-blue-500';
        case 'menunggu_pengambilan': return 'bg-indigo-500';
        case 'disewa': return 'bg-purple-500';
        case 'returned': return 'bg-green-600'; 
        default: return 'bg-gray-500';
    }
}

