<main class="container section content-center">
    <h1><?php echo $property->title?></h1>

        <img loading="lazy" src="/img/<?php echo $property->image?>" alt="property image">

    <div class="property-summary">
        <p class="price">$<?php echo $property->price?></p>

        <ul class="details-icons">
            <li>
                <img loading="lazy" src="build/img/icono_wc.svg" alt="wc icon">
                <p><?php echo $property->wc?></p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking icon">
                <p><?php echo $property->parking?></p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="room icon">
                <p><?php echo $property->rooms?></p>
            </li>
        </ul>

        <p><?php echo $property->description?></p>
    </div>
</main>