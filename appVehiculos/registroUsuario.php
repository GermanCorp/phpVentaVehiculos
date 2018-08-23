<?PHP
$hostname_localhost="localhost";
$database_localhost="ventaVehiculos";
$username_localhost="root";
$password_localhost="";

$json=array();

 if(isset($_GET["nombres"]) && isset($_GET["apellidos"]) && isset($_GET["nombreUsuario"])
    &&isset($_GET["pasword"]) && isset($_GET["celular"]) && isset($_GET["telefono"]) &&
    isset($_GET["email"])){
  $nombres=$_GET['nombres'];
  $apellidos=$_GET['apellidos'];
  $nombreUsuario=$_GET['nombreUsuario'];
  $pasword=$_GET['pasword'];
  $celular=$_GET['celular'];
  $telefono=$_GET['telefono'];
  $email=$_GET['email'];


  $conexion = new mysqli($hostname_localhost, $username_localhost, $password_localhost, $database_localhost);

 
  $insert="INSERT INTO usuarios(nombres, apellidos, nombreUsuario, pasword, celular, telefono, email) VALUES ('{$nombres}','{$apellidos}','{$nombreUsuario}',
    '{$pasword}','{ $celular}','{$telefono}','{$email}')";
  $resultado_insert = mysqli_query($conexion,$insert);
  
 
  if($resultado_insert ){
    $consulta = "SELECT * FROM usuarios WHERE nombres = '{$nombres}'";
    $resultado =mysqli_query($conexion,$consulta);
   
  
   if($registro=mysqli_fetch_array($resultado)){
    $json['usuarios'][]=$registro;
   }
   mysqli_close($conexion);
   echo json_encode($json);
   
  }else{
   $resulta["nombres"]="NO registra";
   $resulta["apellidos"]="NO registra";
   $resulta["nombreUsuario"]="NO registra";
   $resulta["pasword"]="NO registra";
   $resulta["celular"]="NO registra";
   $resulta["telefono"]="NO registra";
   $resulta["email"]="NO registra";
   $json['usuarios'][]=$resulta;
   echo json_encode($json);
  }
 }else{
  $resulta["nombres"]="WS NO retorna";
  $resulta["apellidos"]="WS NO retorna";
  $resulta["nombreUsuario"]="WS NO retorna";
  $resulta["pasword"]="WS NO retorna";
  $resulta["celular"]="WS NO retorna";
  $resulta["telefono"]="WS NO retorna";
  $resulta["email"]="WS NO retorna";
  $json['usuario'][]=$resulta;
  echo json_encode($json);
 }
?>﻿