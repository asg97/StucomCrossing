<?php 

	function conectar($db) {

		$conexion = mysqli_connect("localhost", "root", "", $db) or die("Hubo un error en la consulta");

		return $conexion;
	}

	function desconectar($conn) {

		mysqli_close($conn);

	}



?>