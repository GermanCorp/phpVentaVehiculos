<?php
    include ("conexion.php");

    $con = conectar();
    $consulta = "SELECT * FROM vehiculo";
    $resultado = mysqli_query($con, $consulta);

    while ($registro = mysqli_fetch_array($resultado)){
        $result["idVehiculo"] = $registro['idVehiculo'];
        $result["idVehiculo"] = $registro['idVehiculo'];
        $result["idVehiculo"] = $registro['idVehiculo'];
        $result["idVehiculo"] = $registro['idVehiculo'];
        $result["idVehiculo"] = $registro['idVehiculo'];

    }
?>

