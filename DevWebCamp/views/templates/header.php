<header class="header">
    <div class="header__contenedor">
        <nav class="header__navegacion">

            <?php if(isAuth()): ?>
                <?php if(isAdmin()): ?>
                <a href="/admin/dashboard" class="header__enlace">Administrar</a>
                <?php endif; ?>
                
                <form method="POST" action="/logout" class="header__form">
                    <input type="submit" value="Cerrar Sesión" class="header__submit--logout">
                </form>
            <?php else: ?>
                <a href="/registro" class="header__enlace">Registro</a>
                <a href="/login" class="header__enlace">Iniciar Sesión</a>
            <?php endif; ?>
        </nav>

        <div class="header__contenido">
            <a href="/">
                <h1 class="header__logo">&#60; DevWebCamp /></h1>
            </a>

            <p class="header__texto">Octubre 5-6 - 2023</p>
            <p class="header__texto header__texto--modalidad">En Línea - Presencial</p>

            <a href="<?php echo isAuth() ? '/finalizar-registro' : '/registro'; ?>" class="header__boton">Comprar Pase</a>
        </div>
    </div>
</header>
<div class="barra">
    <div class="barra__contenido">
        <a href="/">
            <h2 class="barra__logo">&#60; DevWebCamp /></h2>
        </a>
        <nav class="navegacion">
            <a href="/devwebcamp" class="navegacion__enlace <?php echo pagina_actual('/devwebcamp') ? 'navegacion__enlace--actual' : ''; ?>">Evento</a>
            <a href="/paquetes" class="navegacion__enlace <?php echo pagina_actual('/paquetes') ? 'navegacion__enlace--actual' : ''; ?>">Paquetes</a>
            <a href="/workshops-conferencias" class="navegacion__enlace <?php echo pagina_actual('/workshops-conferencias') ? 'navegacion__enlace--actual' : ''; ?>">Workshops / Conferencias</a>
            <a href="<?php echo isAuth() ? '/finalizar-registro' : '/registro'; ?>" class="navegacion__enlace <?php echo (pagina_actual('/registro') || pagina_actual('/finalizar-registro')) ? 'navegacion__enlace--actual' : ''; ?>">Comprar Pase</a>        </nav>
    </div>
</div>

