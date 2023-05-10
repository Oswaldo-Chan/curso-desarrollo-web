document.addEventListener('DOMContentLoaded', function() {

    eventListeners();
    darkMode();
});

function darkMode() {
    const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    const btnDarkMode = document.querySelector('.btn-dark-mode');

    if (prefersDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');

    }

    prefersDarkMode.addEventListener('change', function() {
        if (prefersDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
    
        }
    });

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