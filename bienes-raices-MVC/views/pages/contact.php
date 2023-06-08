<main class="container section">
    <h1>Contacto</h1>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" alt="contact image">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form class="form" action="/contact" method="POST">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="name">Nombre</label>
            <input name="contact[name]" type="text" placeholder="Ingrese su nombre" id="name" required>

            <label for="email">Correo</label>
            <input name="contact[email]" type="email" placeholder="Ingrese su correo" id="email" required>

            <label for="phone">Teléfono</label>
            <input name="contact[phone]" type="tel" placeholder="Ingrese su teléfono" id="phone"> 
        
            <label for="message">Mensaje</label>
            <textarea name="contact[message]" id="message" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="options">Venta o Compra:</label>
            <select id="options" name="contact[type]" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Venta">Venta</option>
            </select>

            <label for="price">Precio o Presupuesto</label>
            <input name="contact[price]" type="number" placeholder="Ingrese Presupuesto" id="price" required>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>Como desea ser contactado</p>
            <div class="contact-way">
                <label for="contact-tel">Teléfono</label>
                <input name="contact[contact]" type="radio" value="tel" id="contact" required>

                <label for="contact-email">Correo</label>
                <input name="contact[contact]" type="radio" value="email" id="email" required>
            </div>

            <p>Si eligió telefono, elija la fecha y hora</p>
            
            <label for="date">Fecha:</label>
            <input name="contact[date]" type="date" id="date">

            
            <label for="time">Hora:</label>
            <input name="contact[hour]" type="time" id="time" min="10:00" max="20:00">
        </fieldset>

        <input type="submit" value="send" class="btn-purple">
    </form>
</main>