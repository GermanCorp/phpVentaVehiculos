<?PHP
include ("conexion.php");

$conexion = conectar();

  $id=$_POST["id"];
  $nombres=$_POST["nombres"];
  $apellidos=$_POST["apellidos"];
  $telefono=$_POST["telefono"];
  $celular=$_POST["celular"];
  $email=$_POST["email"];
  $nombreUsuario=$_POST["nombreUsuario"];
  $contrasena=$_POST["contrasena"];
  $direccion =$_POST["direccion"];
  $fotoUsuario = $_POST["fotoUsuario"];

    $dir='imagenes/$id.jpg'; //ubicación en el host (EJ, /imagenes/foto.jpg) 
if(file_exists($dir)) //verifica que el archivo existe 
 {  
 if(unlink($dir)) // si es true, llama la función 
   echo "El archivo fue borrado";  
 }  else {
  
  $path = "imagenes/$id.jpg";
  $url = "http://$hostname_localhost/appVehiculos/$path";
  file_put_contents($path, base64_decode($fotoUsuario));
  $bytesArchivo = file_get_contents($path);

}

  $stms = $conexion->prepare("Update usuarios Set nombres = ?, apellidos = ?, nombreUsuario = ?, pasword = ?, celular = ?, telefono = ?, email = ?, direccion = ? , fotoPerfil = ? Where idUsuarios = ? ");
  $stms->bind_param("sssssssssi", $nombres,$apellidos,$nombreUsuario, $contrasena,$celular, $telefono , $email ,$direccion,$path,$id);
  $stms->execute();



  if($stms->execute()){
      echo "registra";
}else{
     echo " no registra";
   }   



?>﻿
