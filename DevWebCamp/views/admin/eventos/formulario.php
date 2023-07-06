<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Evento</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre Evento</label>
        <input 
            type="text" 
            class="formulario__input" 
            id="nombre" 
            name="nombre" 
            placeholder="Ingrese el nombre del evento" 
            value="<?php echo $evento->nombre ?? ''; ?>" 
        >
    </div>
    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Descripción Evento</label>
        <textarea 
            class="formulario__input" 
            id="descripcion" 
            name="descripcion" 
            placeholder="Ingrese la descripción del evento" 
            rows="4"
            value="<?php echo $evento->descripcion ?? ''; ?>" 
        ></textarea>
    </div>
</fieldset>