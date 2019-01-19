<?php

require_once ("bd/conexion.php");

$conexion =  new Conexion();

    $base = $conexion->conectar(); 
	
	if ($base->error !='')
        {
            echo 'Hubo un error '+$base->error;
        } else {
            echo 'OK';
        }
 
