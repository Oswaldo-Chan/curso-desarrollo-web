document.addEventListener('DOMContentLoaded', function() {

    eventListeners();
});

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', responsiveNav);
}

function responsiveNav() {
    const nav = document.querySelector('.nav');

    nav.classList.toggle('show-nav');
}