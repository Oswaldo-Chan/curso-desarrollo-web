<?php
    require '../includes/app.php';
    userAuth();
    
    use App\Property;
    use App\Seller;

    $properties = Property::all();
    $sellers = Seller::all();

    $result = $_GET['result'] ?? null; //enves de usar isset
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {

            $type = $_POST['type'];

            if (validateTypeContent($type)) {
                if ($type === 'seller') {
                    $seller = Seller::find($id);
                    $seller->delete();
                } else if ($type === 'property') {
                    $property = Property::find($id);
                    $property->delete();
                }
            }
        }
    }
    //include a template
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Administrador de Bienes Raíces</h1>
        <?php if (intval($result) === 1): ?>
            <p class="alert success">Agregado Correctamente</p>
        <?php elseif (intval($result) === 2): ?>
            <p class="alert success">Actualizado Correctamente</p>
        <?php endif; ?>
    
        <a href="/admin/properties/create.php" class="btn btn-purple">Nueva Propiedad</a>
        <a href="/admin/sellers/create.php" class="btn btn-yellow">Nuevo Vendedor</a>

            <h2>Propiedades</h2>

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
                                    <input type="hidden" name="type" value="property">
                                    <input type="submit" class="btn-red-block" value="Eliminar">
                                </form>
                                <a class="btn-green-block" href="/admin/properties/update.php?id=<?php echo $property->id ?>">Actualizar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Vendedores</h2>

            <table class="table-properties">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($sellers as $seller): ?>
                        <tr>
                            <td><?php echo $seller->id; ?></td>
                            <td><?php echo $seller->name." ".$seller->surname; ?></td>
                            <td><?php echo $seller->phone; ?></td>
                            <td>
                                <form method="POST" class="w-100">
                                    <input type="hidden" name="id" value="<?php echo $seller->id ?>">
                                    <input type="hidden" name="type" value="seller">
                                    <input type="submit" class="btn-red-block" value="Eliminar">
                                </form>
                                <a class="btn-green-block" href="/admin/sellers/update.php?id=<?php echo $seller->id ?>">Actualizar</a>
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
