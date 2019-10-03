<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Content-Type: text/html; charset=utf-8");
$method = $_SERVER['REQUEST_METHOD'];

//www\Flautaoke20\webservices\flautaoke20
function conectarDB(){

  $servidor = "localhost";
  $usuario = "recursos_gespro";
  $password = "Hola123Gespro";
  $bd = "prueba_general";

    $conexion = mysqli_connect($servidor, $usuario, $password,$bd);

        if($conexion){
            echo "";
        }else{
            echo 'Ha sucedido un error inexperado en la conexion de la base de datos
';
        }

    return $conexion;
}
?>
