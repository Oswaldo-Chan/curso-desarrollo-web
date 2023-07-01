<main class="auth">
    <h2 class="auth__heading"><h1><?php echo $titulo; ?></h1></h2>
    <p class="auth__texto">Inicia sesión en DevWebCamp</p>

    <form class="formulario">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input 
                type="email"
                class="formulario__input"
                name="email"
                id="email"
                placeholder="Ingrese su email"
            >
        </div>
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input 
                type="password"
                class="formulario__input"
                name="password"
                id="password"
                placeholder="Ingrese su password"
            >
        </div>

        <input type="submit" class="formulario__submit" value="Iniciar Sesión">
    </form>

    <div class="acciones">
        <a href="/registro" class="acciones__enlace">¿Aún no tienes una cuenta? Obtener una</a>
        <a href="/registro" class="acciones__enlace">¿Olvidaste tu password?</a>
    </div>
</main>