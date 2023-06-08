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
        <h3>Aprende nuevas cosas con nuestros artículos</h3>
        <?php include 'blog-list.php'; ?>
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