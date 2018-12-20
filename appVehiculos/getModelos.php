<?php
include ("conexion.php");

$json = array();
	if(isset($_POST["id"])){
		$id= $_POST["id"];

		$conexion = conectar();
        if ($conexion->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

		$stmt = $conexion->prepare("SELECT mo.idModelo, mo.fkMarca, mo.descripcionModelo, ma.descripcionMarca FROM modelo AS mo INNER JOIN marca AS ma ON mo.fkMarca = ma.idMarca WHERE ma.idMarca = ?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$resultado = $stmt->get_result();

            while($row = mysqli_fetch_array($resultado)) {
                $json['modelo'][] = $row;
            }

        mysqli_close($conexion);
		echo json_encode($json);
	}
	else{
		echo "Error, es necesaria una marca";
	}
?>