<div class="contenedor-anuncios" data-cy="propiedades">
            <!--Tarjetas de los anuncios-->
            
            <?php foreach($propiedades as $propiedad): ?>
            <div class="anuncio"> <!--Cada tarjeta se compone de lo siguiente-->

                <picture> 
                    <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen ?>" alt="anuncio1">
                </picture>
                <div class="contenido-anuncio">
                    <h3> <?php echo $propiedad->titulo; ?> </h3>
                    <p><?php echo $propiedad->descripcion; ?></p>
                    <p class="precio">$ <?php echo $propiedad->precio; ?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" src="build/img/icono_wc.svg" loading="lazy" alt="icono_wc">
                            <p><?php echo $propiedad->wc; ?></p>
                        </li>
                        <li>
                            <img class="icono" src="build/img/icono_estacionamiento.svg" loading="lazy" alt="icono_estacionamiento">
                            <p><?php echo $propiedad->estacionamiento; ?></p>
                        </li>
                        <li>
                            <img class="icono" src="build/img/icono_dormitorio.svg" loading="lazy" alt="icono_dormitorio">
                            <p><?php echo $propiedad->habitaciones; ?></p>
                        </li>
                    </ul>
                    <a href="/propiedad?id=<?php echo $propiedad->id; ?> " 
                        class="boton-amarillo-block" data-cy="enlace-propiedad">Ver Propiedad</a>
                </div> <!-- Contenido anuncio-->
            </div> <!-- anuncio-->
            <?php endforeach; ?>
        </div> <!-- .contenedor-anuncio-->