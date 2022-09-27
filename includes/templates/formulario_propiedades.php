<fieldset>
                <legend>Información General</legend>
                <label for="titulo">Titulo de la propiedad</label>
                <input 
                type="text" class="titulo" name="propiedad[titulo]"  
                placeholder="Título propiedad"
                value=" <?php echo s($propiedad->titulo) ; ?>"
                >

                <label for="precio">Precio</label>
                <input 
                type="number" id="precio" name="propiedad[precio]" 
                placeholder="Precio, en números"
                value="<?php echo s($propiedad->precio); ?>"
                >

                <label for="imagen">Imagen</label>
                <input type="file" accept="image/jpeg, image/png" name="propiedad[imagen]">
                <?php if($propiedad->imagen):?>
                    <img src="/bienesraices/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen propiedad" class="imagen-small">
                    <?php endif;?>
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion de la propiedad</legend>

                <label for="habitaciones">Habitaciones</label>
                <input 
                type="number" id="habitaciones" name="propiedad[habitaciones]" 
                placeholder="Número de habitaciones. Ej: 3" 
                min="1" max="9"
                value="<?php echo s($propiedad->habitaciones); ?>">

                <label for="wc">Baños</label>
                <input 
                type="number" id="wc" name="propiedad[wc]" 
                placeholder="Número de baños. Ej: 2" 
                min="1" max="9"
                value="<?php echo s($propiedad->wc); ?>"
                >

                <label for="estacionamiento">Estacionamiento</label>
                <input 
                type="number" id="estacionamiento" name="propiedad[estacionamiento]" 
                placeholder="Número de estacionamientos. Ej: 3" 
                min="1" max="9"
                value="<?php echo s($propiedad->estacionamiento); ?>"
                >
            </fieldset>


            <fieldset>
                <legend for="vendedor">Vendedor</legend>
                    <select name="propiedad[vendedorId]" id="vendedor">
                            <option selected value="">--Seleccione vendedor--</option>
                        <?php foreach($vendedores as $vendedor): ?>
                            <option 
                            <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''; ?>
                            
                             value=
                              <?php echo s($vendedor->id); ?>>
                              <?php echo s($vendedor->nombre) .  " " .  s($vendedor->apellido); ?></option>
                            <?php endforeach; ?>
                    </select>

            </fieldset>