<?php
    require 'includes/config/database.php';
    $db = connectDB();

    $queryRows = "SELECT COUNT(*) AS total_rows FROM propiedades"; // devuelve el total de filas en total_rows
    $result = mysqli_query($db, $queryRows);
    $table = mysqli_fetch_assoc($result); //lee el resultado
    $totalRows = $table['total_rows']; //obtenemos el valor de total_rows

    $limit = $limit ?? $totalRows; //si la variable limit no se define, el valor default sera $totalRows

    $query = "SELECT * FROM propiedades LIMIT {$limit}";
    $result = mysqli_query($db,$query);
?>

    <div class="properties">
        <?php while($property = mysqli_fetch_assoc($result)): ?>
        <div class="property">
                
            <img loading="lazy" src="/img/<?php echo $property['imagen'] ?>" alt="property image">
                
            <div class="property-content">
                <h3><?php echo $property['nombre'] ?></h3>
                <p><?php echo $property['descripcion'] ?></p>
                <p class="price">$<?php echo $property['precio'] ?></p>

                <ul class="details-icons">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="wc icon">
                        <p><?php echo $property['wc'] ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking icon">
                        <p><?php echo $property['estacionamiento'] ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="room icon">
                        <p><?php echo $property['habitaciones'] ?></p>
                    </li>
                </ul>

                <a class="btn-yellow-block" href="anuncio.php?id=<?php echo $property['id'] ?>">ver propiedad</a>
            </div><!--end property-content-->
        </div><!--end property-->
        <?php endwhile; ?>
    </div> <!--end properties-->
<?php
    mysqli_close($db);
?>

