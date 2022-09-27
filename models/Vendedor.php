<?php

namespace Model;

class Vendedor extends ActiveRecord{
    protected static $tabla = 'vendedores';
    protected static $columnaDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $numero;

    public function __construct($args = []) //De esta manera le decimos que va a tomar un arreglo en su constructor
   {
       $this->id = $args['id'] ?? null;
       $this->nombre = $args['nombre'] ?? '';
       $this->apellido = $args['apellido'] ?? '';
       $this->telefono = $args['telefono'] ?? '';
   }

   public function validar(){
    if(!$this->nombre){
        self::$errores[] = "Debes añadir un nombre!";
    }

    if(!$this->apellido){
        self::$errores[] = "Debes añadir un apellido!";
    }

    if(!$this->telefono){
        self::$errores[] = "Debes añadir un telefono!";
    }

    //Una expresión regular comprueba los parámetros de un atributo:
    //Las barras indican que es algo fijo
    //Los valores en corchetes: El rango de dígitos válido
    //Los valores en las llaves: La cantidad de dígitos

    /*if(!preg_match('/ [0-9] {10} /', $this->telefono)){
        self::$errores[] = "El formato del teléfono no es válido";
    }
*/
    return self::$errores;
}
}

?>