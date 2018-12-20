<?php
include ("conexion.php");

$json = array();
		$con  = conectar();

		$consulta = "select vh.idVehiculo, mc.descripcionMarca, dm.descripcionModelo, vh.anio, vh.color, vh.cilindraje, vh.precioVenta, img.imagen, usr.idUsuarios, usr.nombres, usr.apellidos, usr.celular, usr.telefono, usr.email, usr.fotoPerfil, usr.direccion from vehiculo as vh inner join marca as mc ON mc.idMarca = vh.fkMarca inner join modelo as dm on vh.fkModelo = dm.idModelo inner join imagenesvehiculo as img on vh.idVehiculo = img.fkVehiculo INNER JOIN vehiculosenventa as vev ON vh.idVehiculo = vev.fkVehiculo INNER JOIN usuarios AS usr ON vev.fkUsuario = usr.idUsuarios order by vh.fechaRegistro";

		$resultado = mysqli_query($con,$consulta);

		while ($registro = mysqli_fetch_array($resultado)) {
			//$json['datos'][] = $registro;
            $result["descripcionMarca"]= $registro['descripcionMarca'];
            $result["descripcionModelo"]= $registro['descripcionModelo'];
            $result["anio"]= $registro['anio'];
            $result["color"]= $registro['color'];
            $result["cilindraje"]= $registro['cilindraje'];
            $result["precioVenta"]= $registro['precioVenta'];
            $result["imagen"]= $registro['imagen'];
            $result["idUsuarios"]= $registro['idUsuarios'];
            $result["nombres"]= $registro['nombres'];
            $result["apellidos"]= $registro['apellidos'];
            $result["celular"]= $registro['celular'];
            $result["telefono"]= $registro['telefono'];
            $result["email"]= $registro['email'];
            $result["fotoPerfil"]= $registro['fotoPerfil'];
            $result["direccion"]= $registro['direccion'];

            $json['vehiculo'][]=$result;
		}

		mysqli_close($con);
		echo json_encode($json);
?>