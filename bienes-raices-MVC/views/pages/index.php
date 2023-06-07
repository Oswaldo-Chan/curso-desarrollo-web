<main class="container section">
    <h1>Sobre Nosotros</h1>
    <?php include 'icons.php' ?>
</main>

<section class="container section">
    <h2>Casas y Departamentos en Venta</h2>

    <?php 
        $limit = 3;
        include 'list.php';
    ?>

    <div class="align-left">
        <a href="/properties" class="btn-purple">Ver Todas</a>
    </div>
</section>

<section class="contact-image">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    <a href="contacto.php" class="btn-yellow">Contáctanos</a>
</section>

<div class="container section inferior-section">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="blog-post">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="blog image">
                </picture>
            </div>

            <div class="text-post">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="meta-info">Escrito el: <span>06/05/23</span> por: <span>Admin</span></p>
                    
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                </a>
            </div>
        </article>

        <article class="blog-post">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="blog image">
                </picture>
            </div>

            <div class="text-post">
                <a href="entrada.php">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p class="meta-info">Escrito el: <span>06/05/23</span> por: <span>Admin</span></p>
                    
                    <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimonials">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas
            </blockquote>
            <p>- Oswaldo Chan</p>
        </div>
    </section>
</div>