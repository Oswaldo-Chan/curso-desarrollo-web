<?php
    require '../includes/config/database.php';
    $db = connectDB();
    $query = "SELECT * FROM propiedades";
    $queryResult = mysqli_query($db, $query);
    //show conditional message
    $result = $_GET['result'] ?? null; //enves de usar isset
    //include a template
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
                        <th>Titulo</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($property = mysqli_fetch_assoc($queryResult)): ?>
                        <tr>
                            <td><?php echo $property['id']; ?></td>
                            <td><?php echo $property['nombre']; ?></td>
                            <td> <img src="/img/<?php echo $property['imagen']; ?>" class="table-image"></td>
                            <td>$ <?php echo $property['precio']; ?></td>
                            <td>
                                <a class="btn-red-block" href="#">Eliminar</a>
                                <a class="btn-green-block" href="admin/properties/update.php?id=<?php echo $property['id'] ?>">Actualizar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </main>

<?php
    mysqli_close($db);
    includeTemplate('footer');
?>
