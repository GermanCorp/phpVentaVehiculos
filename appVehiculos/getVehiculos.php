<?php
    include ("conexion.php");

    $con = conectar();
    $consulta = "SELECT * FROM vehiculo";
    $resultado = mysqli_query($con, $consulta);

    while ($registro = mysqli_fetch_array($resultado)){
        $result["idVehiculo"] = $registro['idVehiculo'];
        $result["fkMarca"] = $registro['fkMarca'];
        $result["fkModelo"] = $registro['fkModelo'];
        $result["color"] = $registro['color'];
        $result["anio"] = $registro['anio'];
		$result["cilindraje"] = $registro['cilindraje'];
		$result["fkTransmision"] = $registro['fkTransmision'];
		$result["fkCombustible"] = $registro['fkCombustible'];
		$result["fkTipo"] = $registro['fkTipo'];
		$result["precioVenta"] = $registro['precioVenta'];
		$json['vehiculo'][]=$result;
    }
	
	mysqli_close($con);
	echo json_encode($json);
?>