<?php
    use App\Property;

    $properties = Property::all();

/*     $queryRows = "SELECT COUNT(*) AS total_rows FROM propiedades"; // devuelve el total de filas en total_rows
    $result = mysqli_query($db, $queryRows);
    $table = mysqli_fetch_assoc($result); //lee el resultado
    $totalRows = $table['total_rows']; //obtenemos el valor de total_rows

    $limit = $limit ?? $totalRows; //si la variable limit no se define, el valor default sera $totalRows

    $query = "SELECT * FROM propiedades LIMIT {$limit}";
    $result = mysqli_query($db,$query); */
?>

    <div class="properties">
        <?php foreach($properties as $property): ?>
        <div class="property">
                
            <img loading="lazy" src="/img/<?php echo $property->image ?>" alt="property image">
                
            <div class="property-content">
                <h3><?php echo $property->title ?></h3>
                <p><?php echo $property->description ?></p>
                <p class="price">$<?php echo $property->price ?></p>

                <ul class="details-icons">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="wc icon">
                        <p><?php echo $property->wc ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking icon">
                        <p><?php echo $property->parking ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="room icon">
                        <p><?php echo $property->rooms ?></p>
                    </li>
                </ul>

                <a class="btn-yellow-block" href="anuncio.php?id=<?php echo $property->id ?>">ver propiedad</a>
            </div><!--end property-content-->
        </div><!--end property-->
        <?php endforeach; ?>
    </div> <!--end properties-->

