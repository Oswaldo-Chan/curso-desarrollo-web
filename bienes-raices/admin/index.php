<?php
    require '../includes/app.php';
    userAuth();
    
    use App\Property;
    use App\Seller;

    //property methods
    $properties = Property::all();
    $sellers = Seller::all();

    debug($sellers);

    $result = $_GET['result'] ?? null; //enves de usar isset
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id) {
            $property = Property::find($id);
            $property->delete();
        }
    }
    //include a template
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
                    <?php foreach($properties as $property): ?>
                        <tr>
                            <td><?php echo $property->id; ?></td>
                            <td><?php echo $property->title; ?></td>
                            <td> <img src="/img/<?php echo $property->image; ?>" class="table-image"></td>
                            <td>$ <?php echo $property->price; ?></td>
                            <td>
                                <form method="POST" class="w-100">
                                    <input type="hidden" name="id" value="<?php echo $property->id ?>">
                                    <input type="submit" class="btn-red-block" value="Eliminar">
                                </form>
                                <a class="btn-green-block" href="/admin/properties/update.php?id=<?php echo $property->id ?>">Actualizar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </main>

<?php
    mysqli_close($db);
    includeTemplate('footer');
?>
