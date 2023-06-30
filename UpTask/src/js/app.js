const mobileMenuBtn = document.querySelector('#mobile-menu');
const cerrarMenuBtn = document.querySelector('#cerrar-menu');
const sidebar = document.querySelector('.sidebar');

if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', function() {
        mobileMenuBtn.style.display = 'none';
        sidebar.classList.add('mostrar');
        cerrarMenuBtn.style.display = 'block';
    });
}

if (cerrarMenuBtn) {
    cerrarMenuBtn.addEventListener('click', function() {
        cerrarMenuBtn.style.display = 'none';
        sidebar.classList.add('ocultar');
        mobileMenuBtn.style.display = 'block';
        setTimeout(() => {
            sidebar.classList.remove('mostrar');
            sidebar.classList.remove('ocultar');
        }, 500);
    });
}

const anchoPantalla = document.body.clientWidth;

window.addEventListener('resize', function() {
    const anchoPantalla = document.body.clientWidth;

    if (anchoPantalla >= 768) {
        sidebar.classList.remove('mostrar');
        mobileMenuBtn.style.display = 'block';
    }
});