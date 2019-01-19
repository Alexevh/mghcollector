<?php

include('config.php');


class Conexion {

   
    
    public function conectar() {
        
        try { 
            global $servidor, $usuario, $contrasena, $base;

        $con = new mysqli($servidor, $usuario, $contrasena);    
        $con->query("set names 'utf8'");
        $con->select_db($base);
        return $con;
            
        } catch (Exception $ex) {
            return FALSE;
        }
        
    }


}

class Datos {

    private $noticias = array();
    private $comentarios = array();
    private $post = array();
   

    public function insertar_comentario() {

        $nombre = $_POST["nom"];
        $correo = $_POST["correo"];
        $mensaje = $_POST["mensaje"];
        $noticia = $_POST["id_noticia"];
        //Limpio de basura los inpts vs ataques
        $nombre = stripslashes($nombre);
        $correo = stripslashes($correo);
        $mensaje = stripslashes($mensaje);


        $sql = "insert into comentarios values (null,'$nombre','$correo','null','$mensaje',now(),$noticia);";    
        //Creo un objeto de la clase conexion
        $con = new Conexion();
        //Obtengo una conexion mediante el metodo conectar del objeto
        $mysqli = $con->conectar();
        $res = $mysqli->query($sql);
        //echo $sql;
        return TRUE;
    }

  

  



}
