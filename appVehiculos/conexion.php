<?php
	function conectar(){
		$user = "root";
		$pass = "123456";
		$server = "localhost";
		$db = "ventaVehiculos";
		$con = mysqli_connect($server,$user,$pass,$db);

		return $con;
	}
?>