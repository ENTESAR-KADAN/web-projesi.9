document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById('login-form');
    const messageDiv = document.getElementById('message');
    const loginBtn = document.getElementById('login-btn');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(loginForm);
        fetch('giriş.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                messageDiv.innerHTML = `<p style="color:green;">${data.message}</p>`;
                loginBtn.innerText = 'Çıkış yap';
                loginForm.style.display = 'none';
            } else {
                messageDiv.innerHTML = `<p style="color:red;">${data.message}</p>`;
            }
        })
        .catch(error => console.error('Error:', error));
    });

    loginBtn.addEventListener('click', function(event) {
        if (loginBtn.innerText === 'Çıkış yap') {
            loginBtn.innerText = 'Giriş yap';
            loginForm.style.display = 'block';
            messageDiv.innerHTML = '';
        }
    });
});
