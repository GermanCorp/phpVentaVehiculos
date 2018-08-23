<?php
    include ("conexion.php");

    $json = array();

    if(isset($_GET["idVehiculo"]) && isset($_GET["fkMarca"]) && isset($_GET["fkModelo"]) && isset($_GET["color"]) && isset($_GET["anio"]) && isset($_GET["cilindraje"]) &&
        isset($_GET["fkTransmision"]) && isset($_GET["fkCombustible"]) && isset($_GET["fkTipo"]) && isset($_GET["precioVenta"])  && isset($_GET["fechaRegistro"])){
        $idVehiculo = $_GET["idVehiculo"];
        $fkMarca = $_GET["fkMarca"];
        $fkModelo = $_GET["fkModelo"];
        $color = $_GET["color"];
        $anio = $_GET["anio"];
        $cilindraje= $_GET["cilindraje"];
        $fkTransmision= $_GET["fkTransmision"];
        $fkCombustible= $_GET["fkCombustible"];
        $fkTipo= $_GET["fkTipo"];
        $precioVenta= $_GET["precioVenta"];
        $fechaRegistro= $_GET["fechaRegistro"];

        $conexion = conectar();

        $insert = "INSERT INTO vehiculo (idVehiculo, fkMarca, fkModelo, color, anio, cilindraje, fkTransmision, fkCombustible, fkTipo, precioVenta, fechaRegistro) VALUES ('{$idVehiculo}', '{$fkMarca}', '{$fkModelo}', '{$color}', '{$anio}', '{$cilindraje}', '{$fkTransmision}', '{$fkCombustible}', '{$fkTipo}', '{$precioVenta}', '{$fechaRegistro}')";
        $resultado_insert = mysqli_query($conexion, $insert);

        if($resultado_insert){
            $consulta = "SELECT * FROM vehiculo WHERE idVehiculo = '{$idVehiculo}'";
            $resultado = mysqli_query($conexion, $consulta);

            if($registro = mysqli_fetch_array($resultado)){
                $json['vehiculo'][] = $registro;
            }
            mysqli_close($conexion);
            echo json_encode($json);
        } else{
            $resulta["idVehiculo"] = 0;
            $resulta["fkMarca"] = "No registra";
            $resulta["fkModelo"] = "No registra";
            $resulta["color"] = "No registra";
            $resulta["anio"] = "No registra";
            $resulta["cilindraje"] = "No registra";
            $resulta["fkTransmision"] = "No registra";
            $resulta["fkCombustible"] = "No registra";
            $resulta["fkTipo"] = "No registra";
            $resulta["precioVenta"] = "No registra";
            $resulta["fechaRegistro"] = "No registra";
            $json['vehiculo'][]=$resulta;
            echo json_encode($json);

        }
    } else {
        $resulta["idVehiculo"] = 0;
        $resulta["fkMarca"] = "Ws no retorna";
        $resulta["fkModelo"] = "Ws no retorna";
        $resulta["color"] = "Ws no retorna";
        $resulta["anio"] = "Ws no retorna";
        $resulta["cilindraje"] = "Ws no retorna";
        $resulta["fkTransmision"] = "Ws no retorna";
        $resulta["fkCombustible"] = "Ws no retorna";
        $resulta["fkTipo"] = "Ws no retorna";
        $resulta["precioVenta"] = "Ws no retorna";
        $resulta["fechaRegistro"] = "Ws no retorna";
        $json['vehiculo'][]=$resulta;
        echo json_encode($json);
    }
?>