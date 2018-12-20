<?PHP
include ("conexion.php");

$conexion = conectar();

$json = array();


$id= $_POST["id"]; 
 
 $stmt = $conexion->prepare("SELECT idUsuarios,nombres,apellidos,nombreUsuario,pasword,celular,telefono,email,direccion,fotoPerfil FROM usuarios WHERE idUsuarios = ?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $resultado = $stmt->get_result();
            while($row = mysqli_fetch_array($resultado)) {
                $json['usuarios'][] = $row;
            }
       // mysqli_close($conexion);
    echo json_encode($json);
  
  

?>﻿