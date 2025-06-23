document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form[data-role="search"]');
    const alatList = document.getElementById('alatList');

    if (!form || !alatList) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const query = form.search.value;
        const actionUrl = form.dataset.url;

        alatList.innerHTML = 'Memuat data...';

        fetch(`${actionUrl}?search=${encodeURIComponent(query)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            alatList.innerHTML = html;
        })
        .catch(error => {
            console.error('Gagal mengambil data alat:', error);
        });
    });
});
