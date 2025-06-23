document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('loginForm');
    const errorDiv = document.getElementById('errorMsg');

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        try {
            const response = await fetch('/login', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                window.location.href = data.redirect;
            } else {
                errorDiv.textContent = data.message;
                errorDiv.classList.remove('hidden');
            }
        } catch (err) {
            errorDiv.textContent = 'Terjadi kesalahan sistem.';
            errorDiv.classList.remove('hidden');
        }
    });
});
