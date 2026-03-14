<?php

include_once '../clases/clase_conexion.php';
$u = filter_input(INPUT_POST, "correo");
$c = filter_input(INPUT_POST, "clave");

if($u != "" && $c != ""){
    $con = new clase_conexion();
    $respuesta = $con->logeo($u, $c);
    if($respuesta == 1){
        session_start();
        $_SESSION['correo'] = $u;
        $_SESSION['tiempo'] = time();
    }
    echo $respuesta;
}else{
    echo 2;
}

