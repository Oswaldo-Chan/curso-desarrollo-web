<aside class="sidebar">
    <div class="contenedor-sidebar">
    <h2>UpTask</h2>

    <div class="cerrar-menu">
        <img src="build/img/close.svg" id="cerrar-menu" alt="imagen cerrar menu">
    </div>
    </div>

    <nav class="sidebar-nav">
        <a class="<?php echo ($titulo === 'Mis Proyectos') ? 'activo' : ''; ?>" href="/dashboard">Mis Proyectos</a>
        <a class="<?php echo ($titulo === 'Crear Proyecto') ? 'activo' : ''; ?>" href="/crear-proyecto">Crear Proyecto</a>
        <a class="<?php echo ($titulo === 'Mi Perfil') ? 'activo' : ''; ?>" href="/perfil">Mi Perfil</a>
    </nav>

    <div class="logout-mobile">
        <a href="/logout" class="logout">Cerrar Sesión</a>
    </div>
</aside>