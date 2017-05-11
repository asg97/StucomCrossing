<?php

	require_once("conexion.php");

	function listaUsuarios() {

		$conn = conectar("msg");

		$sql = "SELECT * FROM user WHERE username != '1' ";

		$rs = mysqli_query($conn, $sql);

		desconectar($conn);

		return $rs;

	}

	function getListaUserNames() {

		$conn = conectar("msg");

		$sql = "SELECT username FROM user WHERE username != 'Madtin' ";

		$rs = mysqli_query($conn, $sql);

		desconectar($conn);

		return $rs;

	}

	if(isset($_GET["n"])) {

			$nomUsuario = $_GET["n"];

			eliminaUsuario($nomUsuario);

	}



	function eliminaUsuario($nameKey) {

		$conn = conectar("msg");

		$sql = "DELETE FROM user WHERE username = '$nameKey' ";

		if(mysqli_query($conn, $sql)) {

				echo "<p>Usuario $nameKey eliminado.</p>";

		} else {

				echo mysqli_error($conn);
		}

		desconectar($conn);
	}

	function updatePass($userName, $currentPass, $newPass) {

		$conn = conectar("msg");

		$newPassCif = password_hash($newPass, PASSWORD_DEFAULT);

		$sql = "UPDATE user set password = '$newPassCif' WHERE username = '$userName' AND password = '$currentPass' ";

		if(mysqli_query($conn, $sql)) {

			echo "Bien";

		} else {

			echo mysqli_error($conn);

		}

		desconectar($conn);

	}

