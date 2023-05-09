<?php
    require 'includes/functions.php';
    includeTemplate('header', true);
?>

    <main class="container section">
        <h1>Sobre Nosotros</h1>

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
    </main>

    <section class="container section">
        <h2>Casas y Departamentos en Venta</h2>

        <div class="properties">
            <div class="property">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio1.jpg" alt="property image">
                </picture>

                <div class="property-content">
                    <h3>Casa de Lujo en el Lago</h3>
                    <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
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

                    <a class="btn-yellow-block" href="anuncio.html">ver propiedad</a>
                </div><!--end property-content-->
            </div><!--end property-->

            <div class="property">
                <picture>
                    <source srcset="build/img/anuncio2.webp" type="image/webp">
                    <source srcset="build/img/anuncio2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio2.jpg" alt="property image">
                </picture>

                <div class="property-content">
                    <h3>Casa Terminados de Lujo</h3>
                    <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
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

                    <a class="btn-yellow-block" href="anuncio.html">ver propiedad</a>
                </div><!--end property-content-->
            </div><!--end property-->

            <div class="property">
                <picture>
                    <source srcset="build/img/anuncio3.webp" type="image/webp">
                    <source srcset="build/img/anuncio3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio3.jpg" alt="property image">
                </picture>

                <div class="property-content">
                    <h3>Casa con Lujosa Alberca</h3>
                    <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio</p>
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

                    <a class="btn-yellow-block" href="anuncio.html">ver propiedad</a>
                </div><!--end property-content-->
            </div><!--end property-->
        </div> <!--end properties-->

        <div class="align-left">
            <a href="anuncios.html" class="btn-purple">Ver Todas</a>
        </div>
    </section>

    <section class="contact-image">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.html" class="btn-yellow">Contáctanos</a>
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
                    <a href="entrada.html">
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
                    <a href="entrada.html">
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
    
<?php
    includeTemplate('footer');
?>