<?php
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . '/funciones.php');
define('CARPETA_IMAGENES',  $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');


function incluirTemplate( string $nombre, bool $inicio = false){ //En esta función, vamos a pasar un archivo PHP, que será incluido

    include TEMPLATES_URL . "/${nombre}.php";
}

    
function estaAutenticado () : bool {
    session_start(); //Iniciamos sesión
    

    if(!$_SESSION['login']){ //SI NO TENEMOS NADA EN EL LOGIN, LA VARIABLE QUE CREAMOS
        header('location: /bienesraices/'); //Redireccionamos al inicio
    }

    return $_SESSION['login'];
}

function debugear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}


function s ($string ) : string { //S de Sanitizar
    $s = htmlspecialchars($string);
    return $s;  
}

function esValido($tipo){
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos); //Verifica si un dato se encuentra en el array, devuelve un true o false
}


function mostrarNotificacion($codigo){
    $mensaje = '';

    switch($codigo){
        case 1: $mensaje = 'Creado correctamente';
        break;
        
        case 2: $mensaje = 'Actualizado correctamente';
        break;
        
        case 3: $mensaje = 'Eliminado correctamente';
        break;

        default: $mensaje = false;
        break;
    }

    return $mensaje;
}

function ValidarORedireccionar(string $url){
    $id = $_GET['id'];

    $id = filter_var($id, FILTER_VALIDATE_INT); //Así convertimos a entero y hacemos que no nos inyecten texto


    if(!$id){ //Si no se manda un id en el get, redireccionamos al index
    header("Location: ${url}");
    }

    return $id;
}