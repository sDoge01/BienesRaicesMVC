<?php
namespace Model;

class Propiedad extends ActiveRecord {
    protected static $tabla = 'propiedades';

    protected static $columnaDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion','habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

   public $id; 
   public $titulo; 
   public $precio; 
   public $imagen; 
   public $descripcion; 
   public $habitaciones; 
   public $wc; 
   public $estacionamiento; 
   public $creado; 
   public $vendedorId;

   public function __construct($args = []) //De esta manera le decimos que va a tomar un arreglo en su constructor
   {
       $this->id = $args['id'] ?? null;
       $this->titulo = $args['titulo'] ?? '';
       $this->precio = $args['precio'] ?? '';
       $this->imagen = $args['imagen'] ?? '';
       $this->descripcion = $args['descripcion'] ?? '';
       $this->habitaciones = $args['habitaciones'] ?? '';
       $this->wc = $args['wc'] ?? '';
       $this->estacionamiento = $args['estacionamiento'] ?? '';
       $this->creado = date('y/m/d');
       $this->vendedorId = $args['vendedorId'] ?? '';
   } 

   
   public function validar(){
    if(!$this->titulo){
        self::$errores[] = "Debes añadir un título!";
    }
    
    if(!$this->precio){
        self::$errores[] = "Debes añadir un precio!";
    }
    
    if( strlen($this->descripcion) < 50  ){
        self::$errores[] = "La descripción es obligatoria y debe tener un mínimo de 50 caracteres";
    }
    
    if(!$this->habitaciones){
        self::$errores[] = "Debes añadir un número de habitaciones!";
    }
    
    if(!$this->wc){
        self::$errores[] = "Debes añadir un número de WC's!";
    }
    
    if(!$this->estacionamiento){
        self::$errores[] = "Debes añadir un número de estacionamientos!";
    }
    
    if(!$this->vendedorId){
        self::$errores[] = "Debes añadir un vendedor!";
    }
     
    if(!$this->imagen){
        self::$errores[] = "La imagen de la propiedad es obligatoria! ";
    }
    
  return self::$errores;
   }
}