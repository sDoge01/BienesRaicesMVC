<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {

    
    public static function index(Router $router){


        $a = Propiedad::all();

        $b = Vendedor::all();

        $resultado = null;

        $resultado = $_GET['resultado'] ?? null;

        $router->render("propiedades/admin", [
            'propiedades' => $a,
            'resultado' => $resultado,
            'vendedores' => $b
        ]);
    }

    public static function crear(Router $router){
        $errores = Propiedad::getErrores();
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        
        if($_SERVER['REQUEST_METHOD'] === "POST"){

            $propiedad = new Propiedad($_POST['propiedad']); //Post es un arreglo, so, lo va a rellenar
            //SUBIDA DE ARCHIVOS:

            //Crear un nombre único para la imagen:
            $nombreImagen = md5(  uniqid(  rand(), true ) ) . ".jpg";
    
            //Creando la carpeta de imagenes en caso no exista:
            $carpetaImagenes = "/bienesraices/imagenes/"; //Esto crea un directorio del lado del servidor:

        //Subir la imagen:
        //Realiza un resize a la imagen con Intervention:
            if($_FILES){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
            }

        //Validar:
            $errores = $propiedad->validar();

        //Revisar que el array de errores esté vacío:
            if(empty($errores)){
     
        //Como comprobar si una dirección ya existe: función is_dir

            if(!is_dir(CARPETA_IMAGENES)){
            mkdir(CARPETA_IMAGENES);
            }
    
        //Colocamos la dirección donde irá guradada la imagen:
            $image->save(CARPETA_IMAGENES . $nombreImagen);
    

            $resultado = $propiedad->guardar();
            }

        }

        $router->render('propiedades/crear', [

            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        
        $id = ValidarORedireccionar('/admin');

        $propiedad = Propiedad::find($id);

        $errores = Propiedad::getErrores();

        $vendedores = Vendedor::all();

        if($_SERVER['REQUEST_METHOD'] === "POST"){ //Una vez son enviados los datos:

            $array = $_POST['propiedad'];
        
        
            $propiedad->sincronizar($array);
        
        
            //Validación:
            $errores = $propiedad->validar();
        
            //Subida de archivos:
            //Crear un nombre único para la imagen:
            $nombreImagen = md5(  uniqid(  rand(), true ) ) . ".jpg";
            //Realiza un resize a la imagen con Intervention:
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
                
            }
        
            if(empty($errores)){
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    
                    //Subir la imagen:
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
            
                     $propiedad->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores'   => $errores,
            'vendedores'=> $vendedores
        ]);

    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){ //EVALUAMOS EL POST DE ESTA PÁGINA


            $id = $_POST['id']; //Agarramos el id mandado a través de NAME más debajo
            
        
            //Limpiamos la variable:
            $id = filter_var($id, FILTER_VALIDATE_INT);  
        
            //Eliminamos la propiedad:
            if($id){
        
                $tipo = $_POST['tipo'];
        
                if(esValido($tipo)){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    
    }

}

?>