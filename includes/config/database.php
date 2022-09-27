<?php

    function conectarDB() {
        $db = new mysqli("localhost", "root", "root", "bienes_raices");
        
        
        if(!$db){
            echo "Error al conectar con la base de datos";

            exit;
        }

        return $db;
    }

   

?>