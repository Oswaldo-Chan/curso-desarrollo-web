
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
                foreach($eventos['conferencias_v'] as $evento):?>
                    <?php include __DIR__.'/evento.php'; ?>
                <?php endforeach; 
            }?>
        </div>

        <p class="eventos-registro__fecha">Domingo 7 de Octubre</p>

        <div class="eventos-registro__grid">
            <?php if (isset($eventos['conferencias_d'])) {
                foreach($eventos['conferencias_v'] as $evento):?>
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
                foreach($eventos['workshops_v'] as $evento):?>
                    <?php include __DIR__.'/evento.php'; ?>
                <?php endforeach; 
            }?>
        </div>

        <p class="eventos-registro__fecha">Domingo 7 de Octubre</p>

        <div class="eventos-registro__grid eventos--workshops">
            <?php if (isset($eventos['workshops_d'])) {
                foreach($eventos['workshops_v'] as $evento):?>
                    <?php include __DIR__.'/evento.php'; ?>
                <?php endforeach; 
            }?>
        </div>
    </main>

    <aside class="registro">
        <h2 class="registro__heading">Tu Registro</h2>

        <div class="registro__resumen" id="registro-resumen">
            
        </div>
    </aside>
</div>