<main class="seccion contenedor">
        <h1>Actualizar datos de un vendedor</h1>
        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

        

        <?php  foreach($errores as $error): ?>
            <div class="alerta error">
            <?php  echo $error; ?>
            </div>
        <?php endforeach; ?>


        <form class="formulario" method="POST" enctype="multipart/form-data"> 
            <?php include 'formulario.php'; ?>
            <input type="submit" value="Guardar cambios" class="boton boton-verde">
        </form>
        

    </main>