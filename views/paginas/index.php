
    <main class="contenedor seccion">
        <h2 data-cy='heading-nosotros'>Mas sobre nosotros</h2>
        <?php include 'iconos.php'; ?>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en venta</h2>
        <?php 
        include  'listado.php'; ?>
        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde" data-cy="todas-propiedades">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="/contacto" class="boton-amarillo" data-cy='boton-contacto'>Contáctanos</a>
    </section>

    <div class="seccion contenedor seccion-inferior">
        <section data-cy="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                <picture>
                    <!--<source srcset="build/img/blog1.webp" type="image/webp"> -->
                    <!--<source srcset="build/img/blog1.jpg" type="image/jpeg"> -->
                    <img src="build/img/blog1.jpg" alt="Texto entrada blog" loading="lazy" >
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el <span>25/01/2022</span> por <span>Philippe</span></p>
                    <p>
                        Consejos para construir una terraza en el techo de tu casa con los mejores materiales

                    </p>
                </a>
            </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                <picture>
                    <!--<source srcset="build/img/blog2.webp" type="image/webp"> -->
                   <!-- <source srcset="build/src/img/blog2.jpg" type="image/jpeg"> -->
                    <img src="build/img/blog2.jpg" alt="Texto entrada blog" loading="lazy" >
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoración del hogar</h4>
                    <p class="informacion-meta">Escrito el <span>25/01/2022</span> por <span>Philippe</span></p>
                    <p>
                        Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.

                    </p>
                </a>
            </div>
            </article>
        </section>
        <section class="testimoniales" data-cy="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple todas mis expectativas
                </blockquote>
                <p>- Philippe Nakayama (Egocéntrico Multimillonario)</p>
            </div>
        </section>
    </div>