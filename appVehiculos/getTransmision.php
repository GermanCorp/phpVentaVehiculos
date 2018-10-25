<?php
include ("conexion.php");

$json = array();
		$con  = conectar();

		$consulta = "SELECT * FROM transmision";
		$resultado = mysqli_query($con,$consulta);

		while ($registro = mysqli_fetch_array($resultado)) {
			$json['transmision'][] = $registro;
		}

		mysqli_close($con);
		echo json_encode($json);
?>