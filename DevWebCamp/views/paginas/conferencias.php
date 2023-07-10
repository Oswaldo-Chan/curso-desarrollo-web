<main class="agenda">
    <h2 class="agenda__heading"><?php echo $titulo; ?></h2>
    <p class="agenda__descripcion">Talleres y Conferencias dictados por expertos en Desarrollo Web</p>

    <div class="eventos">
        <h3 <?php animacion(); ?> class="eventos__heading">&lt; Conferencias /></h3>
        <p class="eventos__fecha">Viernes 5 de Octubre</p>
        
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php if (isset($eventos['conferencias_v'])) {
                    foreach($eventos['conferencias_v'] as $evento):?>
                        <?php include __DIR__.'../../templates/evento.php'; ?>
                    <?php endforeach; 
                }?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

        <p class="eventos__fecha">Sábado 6 de Octubre</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php if (isset($eventos['conferencias_s'])) {
                    foreach($eventos['conferencias_s'] as $evento):?>
                        <?php include __DIR__.'../../templates/evento.php'; ?>
                    <?php endforeach; 
                }?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

        <p class="eventos__fecha">Domingo 7 de Octubre</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php if (isset($eventos['conferencias_d'])) {
                    foreach($eventos['conferencias_d'] as $evento):?>
                        <?php include __DIR__.'../../templates/evento.php'; ?>
                    <?php endforeach; 
                }?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <div class="eventos eventos--workshops">
        <h3 <?php animacion(); ?> class="eventos__heading">&lt; Workshops /></h3>
       
        <p class="eventos__fecha">Viernes 5 de Octubre</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php if (isset($eventos['workshops_v'])) {
                    foreach($eventos['workshops_v'] as $evento):?>
                        <?php include __DIR__.'../../templates/evento.php'; ?>
                    <?php endforeach; 
                }?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

        <p class="eventos__fecha">Sábado 6 de Octubre</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php if (isset($eventos['workshops_s'])) {
                    foreach($eventos['workshops_s'] as $evento):?>
                        <?php include __DIR__.'../../templates/evento.php'; ?>
                    <?php endforeach; 
                }?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

        <p class="eventos__fecha">Domingo 7 de Octubre</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php if (isset($eventos['workshops_d'])) {
                    foreach($eventos['workshops_d'] as $evento):?>
                        <?php include __DIR__.'../../templates/evento.php'; ?>
                    <?php endforeach; 
                }?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</main>