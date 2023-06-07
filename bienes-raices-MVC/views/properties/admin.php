<main class="container section">
    <h1>Administrador de Bienes Raíces</h1>

    <?php 
        if ($result) {
            $message = showAlert(intval($result));

            if ($message) { ?>
                <p class="alert success"><?php echo sanitize($message)?></p>
            <?php }
        } ?>
    
        <a href="/properties/create" class="btn btn-purple">Nueva Propiedad</a>
        <a href="/sellers/create" class="btn btn-yellow">Nuevo Vendedor</a>

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
                            <form method="POST" class="w-100" action="/properties/delete">
                                <input type="hidden" name="id" value="<?php echo $property->id ?>">
                                <input type="hidden" name="type" value="property">
                                <input type="submit" class="btn-red-block" value="Eliminar">
                            </form>

                            <a class="btn-green-block" href="/properties/update?id=<?php echo $property->id ?>">Actualizar</a>
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
                        <a class="btn-green-block" href="/sellers/update?id=<?php echo $seller->id ?>">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>