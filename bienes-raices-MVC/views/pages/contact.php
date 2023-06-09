<main class="container section">
    <h1>Contacto</h1>

    <?php 
    if($message) {
        if ($sent) {?>
            <p class='alert success'><?php echo $message?></p>;
        <?php } else { ?>
            <p class='alert error'><?php echo $message ?></p>;
        <?php }
    }
    ?>

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
                <input name="contact[contact]" type="radio" value="phone" id="contact-tel" required>

                <label for="contact-email">Correo</label>
                <input name="contact[contact]" type="radio" value="email" id="contact-email" required>
            </div>

            <div id="contact"></div>
        </fieldset>

        <input type="submit" value="send" class="btn-purple">
    </form>
</main>