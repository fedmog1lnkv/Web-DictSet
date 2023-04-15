const passwordInputEye = document.getElementById('password');
const togglePasswordButton = document.querySelector('.toggle-password');

togglePasswordButton.addEventListener('click', () => {
    if (passwordInputEye.type === 'password') {
        passwordInputEye.type = 'text';
        togglePasswordButton.classList.add('show-password');
    } else {
        passwordInputEye.type = 'password';
        togglePasswordButton.classList.remove('show-password');
    }
});