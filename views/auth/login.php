<h1>Login</h1>
<main class="seccion contenedor contenido-centrado">
        <h1>Iniciar Sesión</h1>
        <?php foreach($errores as $error):  ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>
        
        <form data-cy="formulario-login" method="POST" class="formulario" action="/login">
        <fieldset>
                <legend>Email y Password</legend>


                <label for="email">E-mail</label>
                <input type="email"  name="email" placeholder="Tu correo" id="email">

                <label for="password">Contraseña</label>
                <input type="password"  name="password" placeholder="Tu password" id="password">

                
                <input type="submit" value="Iniciar sesión" class="boton boton-verde">
               
            </fieldset>
        </form>

    </main>