<?php

namespace MVC;

class Router {

public $rutasGET = [];
public $rutasPOST = [];



    public function get($url, $fn){
        $this->rutasGET[$url] = $fn; //rutasGET['/login'] = 'login';
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn; 
    }

    public function comprobarRutas(){
        session_start();

        $auth = $_SESSION['login'] ?? null;




        //Arreglo con las rutas protegidas:
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';

        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo == 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null; //'login' = 
        }else{
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header('Location: /');
        }

        if($fn){
            //Esto quiere decir que la url existe
            call_user_func($fn, $this);
        }else{
            echo "Página no encontrada o Ruta no válida";
        }
    }

    public function render($view, $datos = []){

        foreach($datos as $key => $value){
            $$key = $value;
        }

        ob_start();

        include_once __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        include_once __DIR__ . "/views/layout.php";

    }

}

?>