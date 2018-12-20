<?PHP
$hostname_localhost="localhost";
$database_localhost="ventaVehiculos";
$username_localhost="root";
$password_localhost="";

$conexion = new mysqli($hostname_localhost, $username_localhost, $password_localhost, $database_localhost);

//$ultimoId = 0;


  $nombres=$_POST["nombres"];
  $apellidos=$_POST["apellidos"];
  $telefono=$_POST["telefono"];
  $celular=$_POST["celular"];
  $email=$_POST["email"];
  $nombreUsuario=$_POST["nombreUsuario"];
  $contrasena=$_POST["contrasena"];
  $direccion =$_POST["direccion"];
  $imagen =$_POST["imagen"];

 

  $sql = "INSERT INTO usuarios(nombres,apellidos,nombreUsuario,pasword,celular,telefono,email,fechaRegistro,direccion) VALUES(?,?,?,?,?,?,?,NOW(),?)";
  $stm = $conexion->prepare($sql);
  $stm->bind_param("ssssssss",  $nombres,$apellidos,$nombreUsuario, $contrasena,$celular, $telefono , $email ,$direccion);
  //$stm->execute();

    if($stm->execute()){
      echo 'registra';
    }else{
     echo 'no registra';
   }   


 $st = $conexion->prepare("SELECT idUsuarios FROM usuarios ORDER BY idUsuarios DESC LIMIT 1");
     $st->execute();
    $resultado = $st->get_result();
           if($row = mysqli_fetch_row($resultado)) {
                $ultimoId= trim($row[0]);
            }



  $path = "imagenes/$ultimoId.jpg";
  $url = "http://$hostname_localhost/appVehiculo/$path";
  file_put_contents($path, base64_decode($imagen));
  $bytesArchivo = file_get_contents($path);

//UPDATE usuarios SET fotoPerfil = 'imagenes/ultimoId.jpg' WHERE idUsuarios = 50
$stms = $conexion->prepare("Update usuarios Set fotoPerfil ='".$path."' Where idUsuarios ='".$ultimoId."'");
    $stms->execute();

         

//mysql_close($conexion);
 
 
?>﻿