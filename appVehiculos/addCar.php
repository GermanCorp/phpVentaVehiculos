<?php
    include ("conexion.php");

        $conexion       = conectar();
        $fkMarca        = $_POST["fkMarca"];
        $fkModelo       = $_POST["fkModelo"];
        $color          = $_POST["color"];
        $anio           = $_POST["anio"];
        $cilindraje     = $_POST["cilindraje"];
        $fkTransmision  = $_POST["fkTransmision"];
        $fkCombustible  = $_POST["fkCombustible"];
        $fkTipo         = $_POST["fkTipo"];
        $precioVenta    = $_POST["precioVenta"];
        $imagen         = $_POST["imagen"];
        $usuario        = $_POST["usuario"];
        $ultimoId = 0;

// VARIABLE PARA RECUPERAR EL SERVIDOR Y EL PUERTO


// Registrar en la tabla vehiculo
        $sql    = "INSERT INTO vehiculo (fkMarca, fkModelo, color, anio, cilindraje, fkTransmision, fkCombustible, fkTipo, precioVenta, fechaRegistro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt   = $conexion->prepare($sql);
        $stmt->bind_param("iisiiiiid",$fkMarca, $fkModelo, $color, $anio, $cilindraje, $fkTransmision, $fkCombustible, $fkTipo, $precioVenta);
        $ultimoID2 = mysqli_insert_id($conexion);

// nombre de la imagen.
        $nImagen = uniqid($_SERVER['PHP_SELF'], true);
        $nombreImagen = md5($nImagen);


// obtener Ultimo id
    $st = $conexion->prepare("SELECT idVehiculo FROM vehiculo ORDER BY idVehiculo DESC LIMIT 1");
    $st->execute();
    $resultado = $st->get_result();
    if($row = mysqli_fetch_row($resultado)) {
        $ultimoId= trim($row[0]);
    }

// generar archivo bitmap
        $lastId         = $ultimoId+1; // último id insertado
        $path           = "imgCarr/$nombreImagen.jpg";
        $url            = "http://localhost:9001/appVehiculos/$path";
        //$bytesArchivo   = file_get_contents($path);
        file_put_contents($path,base64_decode($imagen));

        $ruta = "imgCarr"."/".$nombreImagen;

// registar en la tabla imagenVehiculo
        $sql2   = "INSERT INTO imagenesvehiculo (imagen, fkVehiculo) VALUES (?, ?)";
        $stmt2  = $conexion->prepare($sql2);
        $stmt2->bind_param("si", $path, $lastId);


// Registrar en la tabla vehiculoenventa
        $sql3   = "INSERT INTO vehiculosenventa (fkVehiculo, fkUsuario, fkEstatus) VALUES (?, ?, 1)";
        $stmt3  = $conexion->prepare($sql3);
        $stmt3->bind_param("ii", $lastId, $usuario);


// validar si se registró en las tablas
        if($stmt->execute() && $stmt2->execute() && $stmt3->execute()){
            echo 'registra';
            //echo $ultimoID2;
        }else{
            echo 'no registra';
            //echo $ultimoID2;
        }

// cerrar conexión
        mysqli_close($conexion);
?>