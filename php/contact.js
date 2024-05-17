document.addEventListener("DOMContentLoaded", function() {
    const contactForm = document.getElementById('contact-form');
    const formMessage = document.getElementById('form-message');

    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(contactForm);
        fetch('send_email.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                formMessage.innerHTML = `<p style="color:green;">${data.message}</p>`;
                contactForm.reset();
            } else {
                formMessage.innerHTML = `<p style="color:red;">${data.message}</p>`;
            }
        })
        .catch(error => {
            formMessage.innerHTML = `<p style="color:red;">Error: ${error.message}</p>`;
        });
    });
});
