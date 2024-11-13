
//Animación del botón con JavaScript (script.js)

document.addEventListener('DOMContentLoaded', () => {
    const nextButton = document.querySelector('.btn-next');
    const cancelButton = document.querySelector('.btn-cancel');

    function animateButton(button) {
        button.classList.add('animate');
        setTimeout(() => button.classList.remove('animate'), 300);
    }

    nextButton.addEventListener('click', () => animateButton(nextButton));
    cancelButton.addEventListener('click', () => animateButton(cancelButton));
});