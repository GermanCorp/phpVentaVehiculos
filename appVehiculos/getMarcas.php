<?php
include ("conexion.php");

$json = array();
		$con  = conectar();

		$consulta = "select idMarca, descripcionMarca from marca";
		$resultado = mysqli_query($con,$consulta);

		while ($registro = mysqli_fetch_array($resultado)) {
			$json['marcas'][] = $registro;
		}

		mysqli_close($con);
		echo json_encode($json);
?>