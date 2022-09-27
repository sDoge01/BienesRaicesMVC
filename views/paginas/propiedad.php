<main class="contenedor seccion contenido-centrado">
    
        
        <h1> <?php $propiedad->titulo; ?></h1>

        <picture>
            <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen_propiedad" loading="lazy">
        </picture>

        <div class="resumen_propiedad">
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

            <p><?php echo $propiedad->descripcion; ?></p>
        </div>

    </main>