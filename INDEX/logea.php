<?php


    require_once "conexion.php";
    require_once "registra.php";

	 function verificarPass($userName, $normalPass) {

		$conn = conectar("msg");

		$sql = "SELECT password FROM user WHERE username = '$userName' ";

		$result = mysqli_query($conn, $sql);

		$rows = mysqli_num_rows($result);

		desconectar($conn);

		if($rows > 0) {
			$row = mysqli_fetch_array($result);
			return password_verify($normalPass, $row['password']);
		}

	 }

	 function getTypeOfUser($userName) {

	 	$conn = conectar("msg");

	 	$sql = "SELECT type FROM user WHERE username = '$userName' ";

	 	$result = mysqli_query($conn, $sql);

	 	$row = mysqli_fetch_array($result);

	 	return $row["type"];

	 }

	 function registraInicioSesion($name, $date, $type) {

	 	$conn = conectar("msg");

	 	$sql = "INSERT INTO event VALUES(null,'$name','$date','$type')";

	 	$rs = mysqli_query($conn, $sql);

	 	return $rs;

	 }