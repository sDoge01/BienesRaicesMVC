<?php 
namespace Model;

class ActiveRecord{
     //Crearemos una instancia a la base de datos de forma estática
    //Estática porque sólo debe instanciarse una sóla vez, por la misma clase
    
    //BASE DE DATOSS:
    protected static $db;
    protected static $columnaDB = [];
    protected static $tabla = '';

    //Arreglo con los errores:
    protected static $errores = [];

   

   public static function setDB($database){
    //Para hacer referencia a un elemento estático de una clase, se usa SELF
    //O también se puede usar el nombre de la clase
    self::$db = $database;
    }

    public static function getErrores(){ //Retorna el arreglo como está
        return static::$errores;
    }

   public function validar(){
        //Arreglo con los errores:
        static::$errores = []; //Lo reseteamos cada vez que se valida:
    
        return static::$errores;
   }

   public function guardar(){
       if(!is_null($this->id)){
           $this->actualizar();
       }else{
           $this->crear();
       }
   }

   public function crear(){

    //Sanitizamos la entrada de datos: 
    $atributos = $this->sanitizarAtributos();

    //Convertir en un string llaves o valores de un arreglo:
    //$string = join(', ', array_keys($atributos));
    
    $query = "INSERT INTO " . static::$tabla . " ( ";
    $query.= join(', ', array_keys($atributos));
    $query.= " ) VALUES (' ";
    $query.= join("', '", array_values($atributos));
    $query.= " ') ";

    $resultado = self::$db->query($query); //En cada instancia conexta una sola vez ya que es una variable estática


    if($resultado){ //Si hemos llegado hasta este punto del código, ta todo ok
        
        //La función header sirve para unas cuantas cosas pero hoy la usaremos para redireccionar al usuario:

        header('Location: /admin?mensaje=1'); 
        /*Esto último agrega al get una llave llamada "resultado" con el valor de 2, por eso se muestra
        en la URL      
        
        */

    }else{
        echo "Algo salió mal :(";
    }
   }

   public function actualizar(){
       
    //Sanitizamos la entrada de datos: 
    $atributos = $this->sanitizarAtributos();
    $valores = [];

    foreach($atributos as $key=> $value){
        $valores[] = "{$key} = '{$value}'";
    }

    $query = "UPDATE " . static::$tabla ." SET "; 
    $query .= join(', ', $valores); 
    //Esto es para separar valores de un string y convertirlo en uno solo, veery useful
    $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
    $query .= " LIMIT 1 ";

    $resultado = self::$db->query($query);

    
    if($resultado){ //Si hemos llegado hasta este punto del código, ta todo ok
        
        //La función header sirve para unas cuantas cosas pero hoy la usaremos para redireccionar al usuario:

        header("Location: /admin?mensaje=2"); 
        /*Esto último agrega al get una llave llamada "resultado" con el valor de 2, por eso se muestra
        en la URL      
        
        */

    }else{
        echo "Algo salió mal :(";
    }
    
   }

   //Eliminar un registro:
   public function eliminar(){
    $query = "DELETE FROM " . static::$tabla ." WHERE id = ". self::$db->escape_string($this->id) . " LIMIT 1";

    $resultado = self::$db->query($query);
    

    if($resultado){
        $this->borrarImagen();
        header("location: /admin?mensaje=3");
    }
   }
   

   public function atributos(){ //De essta forma pasamos los datos a otro arreglo basicamente
    $atributos = [];
    foreach (static::$columnaDB as $columna) {
        if($columna === 'id') continue; //Ignoramos el id ya que la DB la asigna automaticamente
        $atributos[$columna] = $this->$columna;
         
    }
        return $atributos;
   }

   public function sanitizarAtributos(){
       $atributos = $this->atributos();
       $sanitizado = [];
       
       foreach($atributos as $key => $value){
           $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
   }

   //Subida de archivos:

   public function setImagen($image){
    
    //Verificamos si existe una imagen previa: Si existe un id, quiere decir que estamos editando
    if(!is_null($this->id)){
        $this->borrarImagen();
    }
    
    if($image){
        $this->imagen = $image;
       }
   }

   //Eliminar la imagen:
   public function borrarImagen(){
    $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
            
    if($existeArchivo){
        unlink(CARPETA_IMAGENES . $this->imagen);
    }
   }
   
   //Busca todos los registros:
   public static function all (){
       $consulta = "SELECT * FROM " . static::$tabla; 
       //Static busca al objeto que esté invocando este método, originalmente iría hacia la clase padre

       $resultado = self::consultarSQL($consulta);

       return $resultado;
   }

   //Busca un número determinado de registros:
   public static function get ($cantidad){
    $consulta = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad; 
    //Static busca al objeto que esté invocando este método, originalmente iría hacia la clase padre

    $resultado = self::consultarSQL($consulta);

    return $resultado;
}

   //Busca un registro por su id:
   public static function find($id){ //Le pasaremos el id
    $consulta = "SELECT * FROM " . static::$tabla ." WHERE id = ${id}";

    $resultado = self::consultarSQL($consulta);

    return array_shift($resultado);

   }

   public static function consultarSQL($query) {
    //Consultar la base de datos:
    $resultado = self::$db->query($query);
    
    //Iterar los resultados:
    $array = [];

    while($registro = $resultado->fetch_assoc()){ //Esto lo convierte en un arreglo
        $array[] = static::crearObjeto($registro); 
        
    }
    //Liberar la memoria:
    $resultado->free();


    return $array;
   }

   protected static function crearObjeto($a){
    //Recordemos que con SELF hacemos referencia a la clase misma    
    $objeto = new static;


    foreach($a as $key => $value){

        if(property_exists($objeto, $key)){ //Comprueba si un objeto tiene la respectiva propiedad
            $objeto->$key = $value; //Usamos la sintaxis de flecha porque es un objeto
        }
        
    }

    return $objeto;

   }

   public function sincronizar($array = []){

    foreach($array as $key => $value){
        if(property_exists($this, $key) && !is_null($value)){
            $this->$key = $value;
        }
    }

   }
}


?>