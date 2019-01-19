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
   

    public function insertar_registro($fec, $pag, $tiemp) {

        //Sacamos la basura
        $fecha = stripslashes($fec);
        $pagina = stripslashes($pag);
        $tiempo = stripslashes($tiemp);


        $sql = "insert into registro values (null,'$fecha','$pagina','$tiempo');";    
        //Creo un objeto de la clase conexion
        $con = new Conexion();
        //Obtengo una conexion mediante el metodo conectar del objeto
        $mysqli = $con->conectar();
        $res = $mysqli->query($sql);
        //echo $sql;
        return TRUE;
    }

  
public function login($n,  $p)
{
   
    //Armamos la query
    $query = "SELECT * FROM usuarios where usuario='$n' and password='$p'";
    
    //Obtejo de conexion
    $con = new Conexion();
    //Me conecto
    $mysqli = $con->conectar();
    
    //Resultado
    $res = $mysqli->query($query);
    
    //Valoro el resultado
    if ($res->num_rows <=0)
    {
        return FALSE;
    } else 
    {
        return TRUE;
    }
}
  



}
