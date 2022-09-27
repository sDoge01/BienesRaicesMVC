<fieldset>
    <legend>Información General</legend>
        <label for="titulo">Nombre: </label>
        <input 
            type="text" class="titulo" name="vendedor[nombre]"  
            placeholder="Nombre del vendedor"
            value="<?php echo s($vendedor->nombre) ; ?>"
    >

        <label for="apellido">Apellido: </label>
        <input 
            type="text" class="titulo" name="vendedor[apellido]"  
            placeholder="Apellido del vendedor"
            value="<?php echo s($vendedor->apellido) ; ?>"
    >

</fieldset>

<fieldset>
    <legend>Información extra</legend>
        <label for="titulo">Teléfono: </label>
        <input 
            type="text" class="titulo" name="vendedor[telefono]"  
            placeholder="Contacto del vendedor"
            value="<?php echo s($vendedor->telefono) ; ?>"
    >

</fieldset>