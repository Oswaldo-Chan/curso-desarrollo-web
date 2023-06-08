<main class="container section">
    <h1>Actualizar Artículo</h1>
    
    <a href="/admin" class="btn btn-purple">Regresar</a>

    <?php foreach($errors as $error): ?>
        <div class="alert error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" enctype="multipart/form-data">
        <?php include "form.php"?>

        <input type="submit" value="Actualizar Articulo" class="btn btn-yellow">
    </form>
</main>