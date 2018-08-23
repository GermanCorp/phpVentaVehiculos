<?php
include ("conexion.php");

$json = array();
		$con  = conectar();
		$marca;

		$consulta = $con->prepare("select * from modelo WHERE idmarca = (?)");
		$consulta->bind_param($marca);
		$consulta->execute();
		$resultado = mysqli_query($con,$consulta);

		while ($registro = mysqli_fetch_array($resultado)) {
			$json['modelos'][] = $registro;
		}

		mysqli_close($con);
		echo json_encode($json);
?>