document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('alatDetailContainer');

    document.querySelectorAll('.lihat-detail').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const alatId = this.dataset.id;

            fetch(`/alat/${alatId}/detail`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                container.innerHTML = html;
            })
            .catch(error => {
                console.error('Gagal mengambil detail alat:', error);
            });
        });
    });
});
