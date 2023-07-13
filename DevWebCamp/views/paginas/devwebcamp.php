<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencia más importante de Latinoamérica</p>

    <div class="devwebcamp__grid">
        <div <?php animacion(); ?> class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="sobre devwebcamp imagen">
            </picture>
        </div>

        <div <?php animacion(); ?> class="devwebcamp__contenido">
            <p class="devwebcamp__texto">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis voluptatem optio,
                omnis aliquam repellendus architecto unde odio hic nihil dolor sed natus aperiam quibusdam dolorem placeat dicta,
                maxime id. Unde.
            </p>
            <p class="devwebcamp__texto">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis voluptatem optio,
                omnis aliquam repellendus architecto unde odio hic nihil dolor sed natus aperiam quibusdam dolorem placeat dicta,
                maxime id. Unde.
            </p>
        </div>
    </div>
</main>