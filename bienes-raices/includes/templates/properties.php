<?php
    use App\Property;

    $properties = Property::all();

    if ($_SERVER['SCRIPT_NAME'] === '/anuncios.php') {
        $properties = Property::all();
    } else {
        $properties = Property::get(3);
    }
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

