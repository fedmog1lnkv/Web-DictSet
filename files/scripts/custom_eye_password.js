const passwordInput = document.getElementById('password');
const togglePasswordButton = document.querySelector('.toggle-password');

togglePasswordButton.addEventListener('click', () => {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePasswordButton.classList.add('show-password');
    } else {
        passwordInput.type = 'password';
        togglePasswordButton.classList.remove('show-password');
    }
});