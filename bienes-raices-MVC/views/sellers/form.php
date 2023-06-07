<fieldset>
    <legend>Información del Vendedor</legend>

    <label for="title">Nombre:</label>
    <input type="text" id="name" name="seller[name]" placeholder="Ingresar nombre" value="<?php echo sanitize($seller->name); ?>">

    <label for="price">Apellido:</label>
    <input type="text" id="surname" name="seller[surname]" placeholder="Ingresar apellido" value="<?php echo sanitize($seller->surname); ?>">

    <label for="image">Telefono:</label>
    <input type="tel" id="phone" name="seller[phone]" placeholder="Ingresar telefono" value="<?php echo sanitize($seller->phone); ?>">
</fieldset>
