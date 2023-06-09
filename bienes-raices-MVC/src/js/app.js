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

    const contactMethod = document.querySelectorAll('input[name="contact[contact]"]');
    contactMethod.forEach(input => input.addEventListener('click', showContactMethods));
}

function responsiveNav() {
    const nav = document.querySelector('.nav');

    nav.classList.toggle('show-nav');
}

function showContactMethods(e) {
    const contactDiv = document.querySelector('#contact');

    if (e.target.value === 'phone') {
        contactDiv.innerHTML = `
            <label for="phone">Numero Telefónico</label>
            <input name="contact[phone]" type="tel" placeholder="Ingrese su número" id="phone">
        
            <p>Elija la fecha y hora para la llamada</p>
            
            <label for="date">Fecha:</label>
            <input name="contact[date]" type="date" id="date">

            
            <label for="time">Hora:</label>
            <input name="contact[hour]" type="time" id="time" min="10:00" max="20:00">
        `;
    } else {
        contactDiv.innerHTML = `
            <label for="email">Correo</label>
            <input name="contact[email]" type="email" placeholder="Ingrese su correo" id="email" required>
        `;
    }
}