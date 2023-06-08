<main class="container section">
        <h1>Crear Artículo</h1>

        <?php foreach($errors as $error): ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        
        <a href="/admin" class="btn btn-purple">Regresar</a>

        <form class="form" method="POST" action="/blog/create" enctype="multipart/form-data">
            <?php include 'form.php'?>

            <input type="submit" value="Crear Articulo" class="btn btn-yellow">
        </form>
</main>