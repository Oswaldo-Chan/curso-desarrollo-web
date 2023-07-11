
<h2 class="pagina__heading"><?php echo $titulo; ?></h2>
<p class="pagina__descripcion">Elige hasta 5 eventos para asistir de forma presencial.</p>

<div class="eventos-registro">
    <main class="eventos-registro__listado">
        <h3 <?php animacion(); ?> class="eventos-registro__heading--conferencias">&lt; Conferencias /></h3>
        <p class="eventos-registro__fecha">Viernes 5 de Octubre</p>

        <div class="eventos-registro__grid">
            <?php if (isset($eventos['conferencias_v'])) {
                foreach($eventos['conferencias_v'] as $evento):?>
                    <?php include __DIR__.'/evento.php'; ?>
                <?php endforeach; 
            }?>
        </div>

        <p class="eventos-registro__fecha">Sábado 6 de Octubre</p>

        <div class="eventos-registro__grid">
            <?php if (isset($eventos['conferencias_s'])) {
                foreach($eventos['conferencias_s'] as $evento):?>
                    <?php include __DIR__.'/evento.php'; ?>
                <?php endforeach; 
            }?>
        </div>

        <p class="eventos-registro__fecha">Domingo 7 de Octubre</p>

        <div class="eventos-registro__grid">
            <?php if (isset($eventos['conferencias_d'])) {
                foreach($eventos['conferencias_d'] as $evento):?>
                    <?php include __DIR__.'/evento.php'; ?>
                <?php endforeach; 
            }?>
        </div>

        <h3 <?php animacion(); ?> class="eventos-registro__heading--workshops">&lt; Workshops /></h3>
        <p class="eventos-registro__fecha">Viernes 5 de Octubre</p>

        <div class="eventos-registro__grid eventos--workshops">
            <?php if (isset($eventos['workshops_v'])) {
                foreach($eventos['workshops_v'] as $evento):?>
                    <?php include __DIR__.'/evento.php'; ?>
                <?php endforeach; 
            }?>
        </div>

        <p class="eventos-registro__fecha">Sábado 6 de Octubre</p>

        <div class="eventos-registro__grid eventos--workshops">
            <?php if (isset($eventos['workshops_s'])) {
                foreach($eventos['workshops_s'] as $evento):?>
                    <?php include __DIR__.'/evento.php'; ?>
                <?php endforeach; 
            }?>
        </div>

        <p class="eventos-registro__fecha">Domingo 7 de Octubre</p>

        <div class="eventos-registro__grid eventos--workshops">
            <?php if (isset($eventos['workshops_d'])) {
                foreach($eventos['d'] as $evento):?>
                    <?php include __DIR__.'/evento.php'; ?>
                <?php endforeach; 
            }?>
        </div>
    </main>

    <aside class="registro-sidebar">
        <h2 class="registro-sidebar__heading">Tu Registro</h2>

        <div class="registro-sidebar__resumen" id="registro-resumen">
            
        </div>

        <div class="registro-sidebar__regalo">
            <label for="regalo" class="registro-sidebar__label">Selecciona un regalo</label>

            <select id="regalo" class="registro-sidebar__select">
                <option value="" selected disabled>- Seleccionar Regalo -</option>
                <?php 
                    foreach($regalos as $regalo):
                        if($regalo->id !== "0"):
                ?>
                    <option value="<?php echo $regalo->id; ?>"><?php echo $regalo->nombre; ?></option>
                <?php 
                        endif;
                    endforeach; 
                ?>
            </select>
        </div>

        <form id="registro" class="formulario">
            <div class="formulario__campo">
                <input type="submit" class="formulario__submit formulario__submit--full" value="Registrarme">
            </div>
        </form>
    </aside>
</div>