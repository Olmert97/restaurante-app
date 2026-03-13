<?php

/**
 * Description de clase_conexion
 *
 * @author 
 */
class clase_conexion {
    protected $database_host = "localhost";
    protected $database_name = "mydb";
    protected $database_user = "root";
    protected $database_pass = "";
      protected $conn; 
    
    public function __construct(){
    }    
    //abre conexion
    public function abrirConexion() {
        $opciones = array(
                PDO::ATTR_PERSISTENT => true
        );
        try {
            return new PDO("mysql:host=".$this->database_host.";dbname=".$this->database_name, $this->database_user, $this->database_pass,$opciones);
        } catch (PDOException $e) {
            exit('ERROR al conectarse a la base datos. \nDescripción del ERROR: '.$e);
        }
    }
    //verificar usuario
    public function logeo($user, $pass) {
        $con = new clase_conexion();
        $pdo = $con->abrirConexion();
        return $num_contacts = $pdo->query('SELECT COUNT(*) FROM tblempleado WHERE correo = "'. $user.'" and clave ="'. md5($pass).'"')->fetchColumn();
    }
    
    //retornar usuario
    function infoUsuario($user) {
        $con = new clase_conexion();
        $pdo = $con->abrirConexion();        
        if (isset($user)) {
            // seleccionarlo de la bd
            $stmt = $pdo->prepare('SELECT * FROM tbl_agremiados a, tblempleado b WHERE a.idusuario = b.idusuario and b.correo=?');
            $stmt->execute([$user]);
            $contact = $stmt->fetch(PDO::FETCH_ASSOC);  
        }
        return json_encode($contact);
    }




    
    
    
    
    
}
 