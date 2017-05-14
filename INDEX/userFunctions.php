<?php

	require_once("conexion.php");

	function listaUsuarios($userName) {

		$conn = conectar("msg");

		$sql = "SELECT * FROM user WHERE username != '$userName' ";

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

				echo "Usuario $nameKey eliminado.";

		} else {

				echo "no";
		}

		desconectar($conn);
	}




	function updatePass($userName, $newPass) {

		$conn = conectar("msg");

		$newPassCif = password_hash($newPass, PASSWORD_DEFAULT);

		$sql = "UPDATE user set password = '$newPassCif' WHERE username = '$userName' ";

		$resultado = mysqli_query($conn, $sql);

		desconectar($conn);

	}


	function enviaMensaje($sender, $receiver, $date, $subject, $body) {

		$conn = conectar("msg");

		$sql = "INSERT INTO message VALUES(null,'$sender','$receiver','$date', 0, '$subject', '$body')";

		$result = mysqli_query($conn, $sql);

		desconectar($conn);

		return $result;

	}


	if(isset($_GET["u"])) {


		$row = mysqli_fetch_array(getFechaSesion( $_GET['u'] ) );
		$num_rows = mysqli_num_rows( getFechaSesion( $_GET["u"] ) );

		if( $row["recentDate"] === NULL ) {

			echo "<p>El usuario ".$_GET["u"]." notiene un inicio de sesión registrado</p>";

		} else {

			echo "<table>			
						<tr>
							<th>Nombre de usuario</th>
							<th>Fecha - Hora de último inicio de sesión</th>
						</tr>
						<tr>
							<td>".$_GET['u']."</td>
							<td>".$row['recentDate']."</td>
						</tr>
					</table>";

		}

	}


	function getFechaSesion($userName) {

		$conn = conectar("msg");

		$sql = "SELECT max(date) as recentDate FROM event WHERE user = '$userName' AND type = 'I' ";

		$rs = mysqli_query($conn, $sql);

		return $rs;

	}


	function rankingUsuarios() {

		$conn = conectar("msg");

		$sql = "SELECT sender, count(*) AS enviados FROM message GROUP BY sender ORDER BY enviados DESC";

		$rs = mysqli_query($conn, $sql);

		desconectar($conn);

		return $rs;

	}
