<?PHP
include ("conexion.php");


$json = array();

$conexion = conectar();
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
  

 // }
?>﻿