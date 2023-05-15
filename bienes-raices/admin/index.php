<?php
    session_start();
    $auth = $_SESSION['login'];
    if (!$auth) {
        header('Location: /');
    }
    
    require '../includes/config/database.php';
    $db = connectDB();
    $query = "SELECT * FROM propiedades";
    $queryResult = mysqli_query($db, $query);
    //show conditional message
    $result = $_GET['result'] ?? null; //enves de usar isset
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id) {
            //delete file
            $query = "SELECT imagen FROM propiedades WHERE id = {$id}";
            $result = mysqli_query($db,$query);
            $property = mysqli_fetch_assoc($result);
            unlink('../img/'.$property['imagen']);
            //delete property
            $query = "DELETE FROM propiedades WHERE id = {$id}";
            $result = mysqli_query($db,$query);
            if ($result) {
                header('Location: /admin');
            }
        }
    }
    //include a template
    require '../includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Administrador de Bienes Raíces</h1>
        <?php if (intval($result) === 1): ?>
            <p class="alert success">Propiedad Agregada Correctamente</p>
        <?php elseif (intval($result) === 2): ?>
            <p class="alert success">Propiedad Actualizada Correctamente</p>
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
                                <form method="POST" class="w-100">
                                    <input type="hidden" name="id" value="<?php echo $property['id'] ?>">
                                    <input type="submit" class="btn-red-block" value="Eliminar">
                                </form>
                                <a class="btn-green-block" href="/admin/properties/update.php?id=<?php echo $property['id'] ?>">Actualizar</a>
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
