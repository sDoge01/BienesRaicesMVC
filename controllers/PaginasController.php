<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

    public static function index( Router $router){
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('/paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ] );
    }

    public static function nosotros( Router $router){
        $router->render('/paginas/nosotros');
    }
    public static function propiedades( Router $router){
        $propiedades = Propiedad::all();
        $router->render( '/paginas/propiedades', [
            'propiedades' => $propiedades 
        ]);
    }
    public static function propiedad( Router $router ){
        $id = ValidarORedireccionar("/propiedades");
        $propiedad = Propiedad::find($id);

        $router->render('/paginas/propiedad', [
            'propiedad' => $propiedad
        ] );
    }
    public static function blog( Router $router ){
        $router->render("/paginas/blog");
    }
    public static function entrada( Router $router){
        $router->render('/paginas/entrada');
    }
    public static function contacto( Router $router ){

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Guarda las respuestas del POST:
            $respuestas = $_POST['contacto'];




            //Creamos una instancia
            $mail = new PHPMailer();

            //Configuramos el SMTP:
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '4f74c28f521e8c';
            $mail->Password = '7583a7f1f175d0';
            $mail->Port = 2525;

            //Protocolo de seguridad al enviar un email
            $mail->SMTPSecure = 'tls';

            //Parámetros de envio:
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('sevasdoge.01@gmail.com', 'Bienes Raices');
            $mail->Subject = 'Hola perro, tienes un mensaje';

            //Habilitamos HTML:
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definimos el contenido:
            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo mensaje de ' . $respuestas['nombre'] .  ', el quiere ser contactado: </p>';
            
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Su telefono es el ' . $respuestas['telefono'] . '
                y prefiere ser contactado alrededor de las ' . $respuestas['hora'] . 
                ' en la fecha ' . $respuestas['fecha'] . '</p>';
                
            }else{
                $contenido .= '<p>Su email es: ' . $respuestas['email'] . '</p>';
            }
            
            $contenido .= '<p>' .$respuestas['mensaje'] . '</p></html>';
            $mail->Body = $contenido;

            //Enviar el contenido:
            if($mail->send()){
                $mensaje =  'Se ha enviado el mensaje correctamente!';
            }else{
                $mensaje =  'Hubo un error perro, intenta otro día o mira tu codigo XD';
            }



        }

        $router->render( 'paginas/contacto', [
            'mensaje' => $mensaje 
        ]);
    }
}

?>