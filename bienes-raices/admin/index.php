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
    
            <table class="table-properties">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>titulo</th>
                        <th>imagen</th>
                        <th>precio</th>
                        <th>acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Casa en la playa</td>
                        <td> <img src="/img/071a629a3c58143ef6c0d60dee602e60.jpg" class="table-image"></td>
                        <td>1200000</td>
                        <td>
                            <a class="btn-red-block" href="#">Eliminar</a>
                            <a class="btn-green-block" href="#">Actualizar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
    </main>

<?php
    includeTemplate('footer');
?>
