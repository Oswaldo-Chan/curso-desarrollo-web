<?php
    include './includes/templates/header.php';
?>

    <main class="container section">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="contact image">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="form">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="name">Nombre</label>
                <input type="text" placeholder="Ingrese su nombre" id="name">

                <label for="email">Correo</label>
                <input type="email" placeholder="Ingrese su correo" id="email">

                <label for="tel">Teléfono</label>
                <input type="tel" placeholder="Ingrese su teléfono" id="tel"> 
            
                <label for="message">Mensaje</label>
                <textarea id="message"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="options">Venta o Compra:</label>
                <select id="options">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="purchase">Compra</option>
                    <option value="sale">Venta</option>
                </select>

                <label for="budget">Precio o Presupuesto</label>
                <input type="number" placeholder="Ingrese Presupuesto" id="budget">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>
                <div class="contact-way">
                    <label for="contact-tel">Teléfono</label>
                    <input name="contact-option" type="radio" value="tel" id="contact">

                    <label for="contact-email">Correo</label>
                    <input name="contact-option" type="radio" value="email" id="email">
                </div>

                <p>Si eligió telefono, elija la fecha y hora</p>
                
                <label for="date">Fecha:</label>
                <input type="date" id="date">

                
                <label for="time">Hora:</label>
                <input type="time" id="time" min="10:00" max="20:00">
            </fieldset>

            <input type="submit" value="send" class="btn-purple">
        </form>
    </main>
    
<?php
    include './includes/templates/footer.php';
?>