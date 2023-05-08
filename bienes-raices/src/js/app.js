document.addEventListener('DOMContentLoaded', function() {

    eventListeners();
    darkMode();
});

function darkMode() {
    const btnDarkMode = document.querySelector('.btn-dark-mode');

    btnDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', responsiveNav);
}

function responsiveNav() {
    const nav = document.querySelector('.nav');

    nav.classList.toggle('show-nav');
}