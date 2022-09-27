<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{

    

    public static function login(Router $router){
        $errores = [];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $auth = new Admin($_POST);
            $errores = $auth->validar();

            if(empty($errores)){ //Si el usuario ha rellenado los campos para loguearse
                //Verificamos si el usuario existe:
                    $resultado = $auth->existeUsuario();

                //Verificamos si el password es correcto:
                if(!$resultado){
                    $errores = Admin::getErrores();
                }else{
                   $autenticado = $auth->comprobarPassword($resultado);
                   if($autenticado){//Autenticamos al usuario:
                    $auth->autenticar();
                   }else{ //Si no, tiramos un mensaje de error y no pasa nada:
                        $errores = Admin::getErrores();
                   }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }


    public static function logout(){
        session_start(); //Abrimos la sesión actual:
        
        $_SESSION = [];

        header('Location: /');
    }

}


?>