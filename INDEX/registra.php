<?php 
	
	require_once("conexion.php");


	function registrarUsuario($userName, $pass, $realName, $surName) {

		$conn = conectar("msg");

		$passCif = password_hash($pass, PASSWORD_DEFAULT);

		$sql = "INSERT INTO user VALUES('$userName', '$passCif', '$realName', '$surName', 0)";

		$result = mysqli_query($conn, $sql);

		desconectar($conn);

	}

	function verificarUserName($userName) {

		$conn = conectar("msg");

		$sql = "SELECT username FROM user WHERE username = '$userName' ";

		$result = mysqli_query($conn, $sql);

		$rows = mysqli_num_rows($result);

		return ($rows > 0);

	}




