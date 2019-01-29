<?php

//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Methods: GET");
//header("Access-Control-Allow-Headers: Content-Type");
//header("Content-Type: application/json; charset=UTF-8");

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
        $datos->insertar_registro($fecha, $pagina, $tiempo);
        echo 'no dio error';
        return TRUE;
    } catch (Exception $ex) {
         echo 'dio error';
        return FALSE;
    }
    
} else {
    return FALSE;
}