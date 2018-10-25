<?php
include ("conexion.php");

$json = array();

    $conexion = conectar();
    $consulta = "SELECT * FROM tipo";
    $resultado = mysqli_query($conexion, $consulta);

    while ($registro = mysqli_fetch_array($resultado)){
        $json['tipo'][] = $registro;
    }

    mysqli_close($conexion);
    echo json_encode($json);
?>