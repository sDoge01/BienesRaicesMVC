<main class="seccion contenedor">
        <h1>Registrar un vendedor</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        

        <?php  foreach($errores as $error): ?>
            <div class="alerta error">
            <?php  echo $error; ?>
            </div>
        <?php endforeach; ?>


        <form class="formulario" method="POST" action= "/vendedores/crear" enctype="multipart/form-data"> 
            <?php include 'formulario.php'; ?>
            <input type="submit" value="Registrar vendedor" class="boton boton-verde">
        </form>
        

    </main>