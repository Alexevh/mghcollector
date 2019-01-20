<?php

require_once ("bd/conexion.php");

$nombre = $_GET["usuario"];
$pass = $_GET["pass"];
$nombre = stripslashes($nombre);
$pass = stripslashes($pass);


$pagina = $_GET["pagina"];
$fecha = $_GET["fecha"];
$tiempo = $_GET["tiempo"];



$conexion = new Conexion();


$datos = new Datos();

if ($datos->login($nombre, $pass)) {
    try {
        $datos->insertar_registro($pagina, $fecha, $tiempo);
        echo 'dio error';
        return TRUE;
    } catch (Exception $ex) {
         echo 'dio error';
        return FALSE;
    }
    
} else {
    return FALSE;
}