<?php
    $result = $_GET['result'] ?? null; //enves de usar isset
    require '../includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Administrador de Bienes Raíces</h1>
        <?php if (intval($result) === 1): ?>
            <p class="alert success">Propiedad Agregada Correctamente</p>
        <?php endif; ?>
    
        <a href="/admin/properties/create.php" class="btn btn-purple">Nueva Propiedad</a>
    </main>

<?php
    includeTemplate('footer');
?>
