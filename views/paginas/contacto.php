<main class=" contenedor seccion">
        <h1>Contacto</h1>
        <?php 
        if($mensaje){ ?>
        <p class="alerta exito"> <?php echo $mensaje ?> </p>;
        <?php } ?>
         
        <picture>
            <!--<source srcset="build/img/destacada3.webp" type="image/webp"> -->
            <!--<source srcset="build/img/destacada3.jpg" type="image/jpeg"> -->
            <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen-contacto">
        </picture>
        <h2>Llene el formulario</h2>
        <form class="formulario" action="/contacto" method="POST" data-cy="formulario-contacto">
            <fieldset>
                <legend>Información personal</legend>

                <label for="nombre">Nombre</label>
                <input data-cy="input-nombre" type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

                <label for="mensaje">Mensaje</label>
                <textarea data-cy="input-mensaje" id="mensaje" placeholder="Tu mensaje" name="contacto[mensaje]" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacón sobre la propiedad</legend>

                <label for="opciones">Vende o compra</label>
                <select data-cy="input-select" id="opciones" name="contacto[tipo]">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input data-cy="presupuesto" type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]">
            </fieldset>


            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input data-cy="forma-contacto" type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]">

                <label for="contactar-email">E-mail</label>
                <input data-cy="forma-contacto" type="radio" value="email" id="contactar-email" name="contacto[contacto]">
                </div>

                <div id="contacto"></div>
            

            

        </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>