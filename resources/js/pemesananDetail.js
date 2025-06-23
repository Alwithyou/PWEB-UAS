document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('pemesanan-detail-container');
    const id = container.dataset.id;

    fetch(`/user/pemesanan/detail/${id}/data`)
        .then(response => response.json())
        .then(pesanan => {
            container.innerHTML = '';

            if (pesanan.error) {
                container.innerHTML = '<p class="text-red-500">Data tidak ditemukan.</p>';
                return;
            }

            const statusColor = getStatusColor(pesanan.status);

            const card = document.createElement('div');
            card.className = 'p-4 bg-white rounded-xl shadow-md';

            card.innerHTML = `
                <h2 class="text-xl font-bold mb-2 text-gray-800">${pesanan.alat?.name || 'Nama Alat Tidak Diketahui'}</h2>
                <p class="text-sm text-gray-700"><strong>Tanggal Sewa:</strong> ${pesanan.start_date} s/d ${pesanan.end_date}</p>
                <p class="text-sm text-gray-700"><strong>Alamat:</strong> ${pesanan.address}</p>
                <p class="text-sm text-gray-700"><strong>Status:</strong> 
                    <span class="inline-block px-2 py-1 text-white text-xs rounded ${statusColor}">
                        ${pesanan.status}
                    </span>
                </p>
                ${pesanan.total_price ? `
                    <p class="text-sm text-gray-700"><strong>Total Harga:</strong> Rp ${Number(pesanan.total_price).toLocaleString('id-ID')}</p>
                ` : ''}
                ${pesanan.notes ? `<p class="text-sm text-gray-700"><strong>Catatan:</strong> ${pesanan.notes}</p>` : ''}
                ${pesanan.identity_photo ? `
                    <div class="mt-3">
                        <strong class="text-sm text-gray-700">Foto Identitas:</strong><br>
                        <img src="/storage/${pesanan.identity_photo}" class="w-40 mt-1 rounded" alt="Foto Identitas">
                    </div>` : ''}
                ${pesanan.alat?.photo ? `
                    <div class="mt-3">
                        <strong class="text-sm text-gray-700">Foto Alat:</strong><br>
                        <img src="/storage/${pesanan.alat.photo}" class="w-40 mt-1 rounded" alt="Foto Alat">
                    </div>` : ''}
            `;


            container.appendChild(card);

            // Tampilkan form upload jika status disetujui
            if (pesanan.status.toLowerCase() === 'approved') {
                const uploadFormWrapper = document.getElementById('upload-bukti-form');
                uploadFormWrapper.classList.remove('hidden');

                const form = document.getElementById('form-upload-bukti');
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const formData = new FormData(this);

                    fetch(`/user/pemesanan/${pesanan.id}/upload-bukti`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: formData
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                document.getElementById('upload-status').classList.remove('hidden');
                                document.getElementById('upload-status').textContent = 'Upload berhasil!';
                            } else {
                                alert('Upload gagal. ' + (data.message ?? ''));
                            }
                        })
                        .catch(error => {
                            console.error('Upload error:', error);
                            alert('Terjadi kesalahan saat upload.');
                        });
                });
            }

        })
        .catch(error => {
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

