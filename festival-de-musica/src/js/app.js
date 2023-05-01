document.addEventListener('DOMContentLoaded', function() {
    init();
});

function init() {
    fixedNav();
    createGallery();
    scrollNav();
}

function fixedNav() {
    const bar = document.querySelector('.header');
    const aboutFestival = document.querySelector('.about-festival');
    const body = document.querySelector('body');
    
    window.addEventListener('scroll', function() {

        if (aboutFestival.getBoundingClientRect().top < 0) {
            bar.classList.add('fixed');
            body.classList.add('body-scroll');
        } else {
            bar.classList.remove('fixed');
            body.classList.remove('body-scroll');
        }
    });
}

function scrollNav() {
    const links = document.querySelectorAll('.nav-main a');
    
    links.forEach( link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const scrollSection = e.target.attributes.href.value;
            const section = document.querySelector(scrollSection);
            section.scrollIntoView({ behavior: 'smooth'});
        });
    });
}