<?PHP
$hostname_localhost="localhost";
$database_localhost="ventaVehiculos";
$username_localhost="root";
$password_localhost="";

$json = array();

$conexion = new mysqli($hostname_localhost, $username_localhost, $password_localhost, $database_localhost);

$id= $_POST["id"]; 
 
 $stmt = $conexion->prepare("SELECT idUsuarios,nombres,apellidos,nombreUsuario,pasword,celular,telefono,email,direccion,fotoPerfil FROM usuarios WHERE idUsuarios = ?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $resultado = $stmt->get_result();
            while($row = mysqli_fetch_array($resultado)) {
                $json['usuarios'][] = $row;
            }
       
    echo json_encode($json);
  
?>﻿