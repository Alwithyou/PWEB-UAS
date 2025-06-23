document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('#registerForm');
    const errorDiv = document.createElement('div');
    errorDiv.className = 'bg-red-100 text-red-600 px-4 py-2 rounded mb-4 hidden';
    form.insertBefore(errorDiv, form.firstChild);

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        fetch('/register-ajax', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
        .then(async res => {
            const result = await res.json();
            if (!res.ok) throw result;
            window.location.href = result.redirect;
        })
        .catch(err => {
            errorDiv.innerHTML = '';
            errorDiv.classList.remove('hidden');
            if (err.errors) {
                for (let key in err.errors) {
                    errorDiv.innerHTML += `<p>${err.errors[key]}</p>`;
                }
            } else {
                errorDiv.innerText = err.message || 'Terjadi kesalahan.';
            }
        });
    });
});
