<?php
include ("conexion.php");

$json = array();
		$con  = conectar();

		$consulta = "SELECT idMarca as id, descripcionMarca as descripcion FROM marca";
		$resultado = mysqli_query($con,$consulta);

		while ($registro = mysqli_fetch_array($resultado)) {
			$json['datos'][] = $registro;
		}

		mysqli_close($con);
		echo json_encode($json);
?>