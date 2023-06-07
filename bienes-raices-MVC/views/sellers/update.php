<main class="container section">
    <h1>Actualizar Vendedor</h1>

    <a href="/admin" class="btn btn-purple">Regresar</a>

    <?php foreach($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST">
        <?php include 'form.php' ?>

        <input type="submit" value="Guardar Cambios" class="btn btn-yellow">
    </form>
</main>
