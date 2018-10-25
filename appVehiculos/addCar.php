<?php
    include ("conexion.php");

        $conexion = conectar();
		$idVehiculo = $_POST["idVehiculo"];
        $fkMarca = $_POST["fkMarca"];
        $fkModelo = $_POST["fkModelo"];
        $color = $_POST["color"];
        $anio = $_POST["anio"];
        $cilindraje= $_POST["cilindraje"];
        $fkTransmision= $_POST["fkTransmision"];
        $fkCombustible= $_POST["fkCombustible"];
        $fkTipo= $_POST["fkTipo"];
        $precioVenta= $_POST["precioVenta"];

        $sql = "INSERT INTO vehiculo (idVehiculo, fkMarca, fkModelo, color, anio, cilindraje, fkTransmision, fkCombustible, fkTipo, precioVenta, fechaRegistro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("iiisiiiiid",$idVehiculo, $fkMarca, $fkModelo, $color, $anio, $cilindraje, $fkTransmision, $fkCombustible, $fkTipo, $precioVenta);

        if($stmt->execute()){
            echo 'Se registró';
        }else{
            echo 'Error al registrar';
        }

        mysqli_close($conexion);
?>