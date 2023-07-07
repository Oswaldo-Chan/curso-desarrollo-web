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
            value="<?php echo $evento->nombre; ?>" 
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
        ><?php echo $evento->descripcion; ?></textarea>
    </div>
    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Categoría Evento</label>
        <select
            class="formulario__select"
            id="categoria"
            name="categoria_id"
        >
            <option disabled selected value="">- Seleccionar Categoría -</option>
            <?php foreach($categorias as $categoria): ?>
                <option <?php echo ($evento->categoria_id === $categoria->id) ? 'selected' : '' ?> value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Selecciona el día</label>
                
        <div class="formulario__radio">
            <?php foreach($dias as $dia): ?>
                <div>
                    <label for="<?php echo strtolower($dia->nombre); ?>"><?php echo $dia->nombre; ?></label>
                    <input 
                        type="radio" 
                        name="dia" 
                        id="<?php echo strtolower($dia->nombre); ?>"
                        value="<?php echo $dia->id; ?>"
                        <?php echo ($evento->dia_id === $dia->id) ? 'checked' : ''; ?>
                    >
                </div>
            <?php endforeach; ?>
        </div>

        <input type="hidden" name="dia_id" value="<?php echo $evento->dia_id; ?>">
    </div>
    <div id="horas" class="formulario__campo">
        <label for="hora" class="formulario__label">Selecciona la hora</label>
        
        <ul id="horas" class="horas">
            <?php foreach($horas as $hora):?>
                <li data-hora-id="<?php echo $hora->id; ?>" class="horas__hora horas__hora--deshabilitada"><?php echo $hora->hora ?></li>
            <?php endforeach; ?>
        </ul>

        <input type="hidden" name="hora_id" value="<?php echo $evento->hora_id; ?>">
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="ponentes" class="formulario__label">Ponente</label>
        <input 
            type="text" 
            class="formulario__input" 
            id="ponentes" 
            placeholder="Ingrese el nombre del ponente a buscar" 
        >
        <ul id="listado-ponentes" class="listado-ponentes"></ul>
        <input type="hidden" name="ponente_id" value="<?php echo $evento->ponente_id; ?>">
    </div>
    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Lugares Disponibles</label>
        <input 
            type="number"
            min="1" 
            class="formulario__input" 
            id="disponibles" 
            name="disponibles"
            placeholder="Ej. 20" 
            value="<?php echo $evento->disponibles; ?>" 
        >
    </div>
</fieldset>