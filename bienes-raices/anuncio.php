<?php
    include './includes/templates/header.php';
?>

    <main class="container section content-center">
        <h1>Casa en venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="property image">
        </picture>

        <div class="property-summary">
            <p class="price">$3,000,000</p>

            <ul class="details-icons">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="wc icon">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking icon">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="room icon">
                    <p>4</p>
                </li>
            </ul>

            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad perferendis id nulla dolorem recusandae, distinctio minus. Veniam sit dolore quod facilis quasi quaerat doloremque, possimus, deserunt id non vero ut?
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad perferendis id nulla dolorem recusandae, distinctio minus. Veniam sit dolore quod facilis quasi quaerat doloremque, possimus, deserunt id non vero
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad perferendis id nulla dolorem recusandae, distinctio minus. Veniam sit dolore quod facilis quasi quaerat doloremque, possimus, deserunt id non vero
            </p>

            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad perferendis id nulla dolorem recusandae, distinctio minus. Veniam sit dolore quod facilis quasi quaerat doloremque, possimus, deserunt id non vero ut?
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad perferendis id nulla dolorem recusandae, distinctio minus. Veniam sit dolore quod facilis quasi quaerat doloremque, possimus, deserunt id non vero
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad perferendis id nulla dolorem recusandae, distinctio minus. Veniam sit dolore quod facilis quasi quaerat doloremque, possimus, deserunt id non vero
            </p>
        </div>
    </main>
    
<?php
    include './includes/templates/footer.php';
?>