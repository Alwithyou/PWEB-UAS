document.addEventListener('DOMContentLoaded', function () {
    const startInput = document.getElementById('start_date');
    const endInput = document.getElementById('end_date');
    const pricePerDay = parseFloat(document.getElementById('price_per_day').value);
    const totalDisplay = document.getElementById('total_price_display');
    const form = document.getElementById('form-sewa');
    const notif = document.getElementById('notif-area');

    function updateTotalPrice() {
        const start = new Date(startInput.value);
        const end = new Date(endInput.value);

        if (startInput.value && endInput.value && end >= start) {
            const days = Math.floor((end - start) / (1000 * 60 * 60 * 24)) + 1;
            const total = days * pricePerDay;
            totalDisplay.textContent = 'Rp ' + total.toLocaleString('id-ID');
        } else {
            totalDisplay.textContent = 'Rp 0';
        }
    }

    startInput.addEventListener('change', updateTotalPrice);
    endInput.addEventListener('change', updateTotalPrice);

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const alatId = formData.get('alat_id');

        fetch(`/alat/${alatId}/sewa`, {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(async response => {
            const data = await response.json();
            if (response.ok) {
                notif.innerHTML = `<p class="text-green-600">✅ ${data.message}</p>`;
                form.reset();
                totalDisplay.textContent = 'Rp 0';
            } else {
                const errMsg = data.errors ? Object.values(data.errors).join('<br>') : data.message;
                notif.innerHTML = `<p class="text-red-600">❌ ${errMsg}</p>`;
            }
        })
        .catch(err => {
            notif.innerHTML = `<p class="text-red-600">❌ Terjadi kesalahan: ${err}</p>`;
        });
    });
});
