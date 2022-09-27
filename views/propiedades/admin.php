    <main class="seccion contenedor">
        <h1>Administrador de Bienes Raíces</h1>

        <?php
        
        if($resultado){
        
            $mensaje = mostrarNotificacion($resultado);

        if($mensaje){?>

        <p class="alerta exito"> <?php echo s($mensaje) ?> </p>
        <?php
        }
    }

    

    ?>
        
        
        
        <a href="propiedades/crear" class="boton boton-verde">Nueva propiedad</a>
        <a href="vendedores/crear" class="boton boton-verde">Nuevo vendedor</a>

        <h2>Propiedades</h2>

        <table class="propiedades">
            <thead>
                <tr> <!-- Table row-->
                    <th>ID</th> <!-- Table header-->
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach ($propiedades as $propiedad): ?> <!--Propiedad aquí es un iterador!-->
                <tr>
                    <td> <?php echo $propiedad->id ?> </td> <!-- Table data cell, aquí van a ir los ID's de la DB-->
                    <td><?php echo $propiedad->titulo ?></td>
                    <td>$ <?php echo $propiedad->precio ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-tabla">
                
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a class="boton-verde-block" 
                        href="propiedades/actualizar?id=<?php echo $propiedad->id; ?>">Actualizar</a>
                    </td>
                </tr>

                <?php endforeach; ?>
            </tbody>

        </table>

        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr> <!-- Table row-->
                    <th>ID</th> <!-- Table header-->
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                    
                </tr>
            </thead>

            <tbody>
            <?php foreach ($vendedores as $vendedor): ?> <!--Propiedad aquí es un iterador!-->
                <tr>
                    <td> <?php echo $vendedor->id ?> </td> <!-- Table data cell, aquí van a ir los ID's de la DB-->
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido ; ?></td>
                    <td> <?php echo $vendedor->telefono ?></td>
                    
                
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a class="boton-verde-block" 
                        href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>">Actualizar</a>
                    </td>
                </tr>

                <?php endforeach; ?>
            </tbody>

        </table>
            </main>