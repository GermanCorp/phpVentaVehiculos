<?php
include ("conexion.php");

$json = array();
		$con  = conectar();

		$consulta = "SELECT * FROM combustible";
		$resultado = mysqli_query($con,$consulta);

		while ($registro = mysqli_fetch_array($resultado)) {
			$json['combustible'][] = $registro;
		}

		mysqli_close($con);
		echo json_encode($json);
?>