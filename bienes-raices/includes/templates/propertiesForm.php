<fieldset>
    <legend>Información General</legend>

    <label for="title">Titulo:</label>
    <input type="text" id="title" name="property[title]" placeholder="Titulo de la propiedad" value="<?php echo sanitize($property->title); ?>">

    <label for="price">Precio:</label>
    <input type="number" id="price" name="property[price]" placeholder="precio de la propiedad" value="<?php echo sanitize($property->price); ?>">

    <label for="image">Imagen:</label>
    <input type="file" id="image" accept="image/jpeg, image/png" name="property[image]">
    
    <?php if ($property->image): ?>
        <img src="/img/<?php echo $property->image ?>" class="image-small">
    <?php endif; ?>

    <label for="description">Descripcion:</label>
    <textarea id="description" name="property[description]"><?php echo sanitize($property->description); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información de la Propiedad</legend>

    <label for="rooms">Habitaciones:</label>
    <input type="number" id="rooms" name="property[rooms]" placeholder="Ej: 5" min="1" max="10" value="<?php echo sanitize($property->rooms); ?>">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="property[wc]" placeholder="Ej: 5" min="1" max="10" value="<?php echo sanitize($property->wc); ?>">

    <label for="parking">Estacionamiento:</label>
    <input type="number" id="parking" name="property[parking]" placeholder="Ej: 5" min="1" max="10" value="<?php echo sanitize($property->parking); ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
</fieldset>
