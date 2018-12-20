<?PHP
$hostname_localhost="localhost";
$database_localhost="ventaVehiculos";
$username_localhost="root";
$password_localhost="";

$json = array();

$conexion = new mysqli($hostname_localhost, $username_localhost, $password_localhost, $database_localhost);

  $usuario=$_POST["usuario"]; 
  $contrasena = $_POST["contrasena"];
 
  $stmt = $conexion->prepare("SELECT idUsuarios FROM usuarios WHERE nombreUsuario = ? AND pasword = ? ");
  $stmt->bind_param("ss",$usuario,$contrasena);
  $stmt->execute();
            $resultado = $stmt->get_result();
            while($row = mysqli_fetch_array($resultado)) {
                $json['usuarios'][] = $row;
            }


    echo json_encode($json);

    
?>﻿