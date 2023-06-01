<?php
    require 'includes/app.php';
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Más Sobre Nosotros</h1>

       <div class="about-us-content">
        <div class="image">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="about us">
            </picture>
        </div>

        <div class="about-us-text">
            <blockquote>
                25 años de experiencia
            </blockquote>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus ducimus fugiat officiis molestias consequatur deleniti illo non perferendis cupiditate atque ab placeat accusamus maiores magni, asperiores eius dolore voluptates incidunt!</p>
            
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates esse quod dolorum adipisci, quidem aliquid pariatur, atque alias consequatur, officia nostrum sit illum facere soluta? Recusandae, excepturi provident? Non, quam.</p>
        </div>
       </div>
    </main>

    <section class="container section">
        <h1>Nuestros Beneficios</h1>

        <div class="about-us-icons">
            <div class="icon">
                <img loading="lazy" src="build/img/icono1.svg" alt="security icon">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium laborum aspernatur et placeat minima error voluptates quae sunt molestias numquam, recusandae, est voluptate veniam officiis! Illo officiis aliquam eaque reprehenderit?</p>
            </div>
            <div class="icon">
                <img loading="lazy" src="build/img/icono2.svg" alt="price icon">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium laborum aspernatur et placeat minima error voluptates quae sunt molestias numquam, recusandae, est voluptate veniam officiis! Illo officiis aliquam eaque reprehenderit?</p>
            </div>
            <div class="icon">
                <img loading="lazy" src="build/img/icono3.svg" alt="time icon">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium laborum aspernatur et placeat minima error voluptates quae sunt molestias numquam, recusandae, est voluptate veniam officiis! Illo officiis aliquam eaque reprehenderit?</p>
            </div>
        </div>
    </section>
    
<?php
    includeTemplate('footer');
?>