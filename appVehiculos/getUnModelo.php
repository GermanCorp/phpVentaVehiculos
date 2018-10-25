<?php
include ("conexion.php");

$json = array();
	if(isset($_GET["idMarca"])){
		$idMarca = $_GET["idMarca"];

		$conexion = conectar();
		$consulta = "SELECT * FROM modelo WHERE idMarca='{$idMarca}'";
		$resultado = mysqli_query($conexion, $consulta);

		if ($registro = mysqli_fetch_array($resultado)) {
			$json['modelo'][]=$registro;
		}
		else{
			$resultar["idMarca"] = 0;
			$resultar["idModelo"] = 0;
			$resultar["descripcionModelo"] = 'No Registra';
			$json['modelo'][] = $resultar;
		}

		mysqli_close($conexion);
		echo json_encode($json);
	}
	else{
		$resultar["idMarca"] = 0;
		$resultar["idModelo"] = 0;
		$resultar["descripcionModelo"] = 'WS no retorna';
		$json['modelo'][] = $resultar;
		echo json_encode($json);
	}
?>