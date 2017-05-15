<?php 

	require_once("conexion.php");

	function getMessages($userName) {

		$conn = conectar("msg");

		$sql = "SELECT * from message WHERE receiver = '$userName' ORDER BY date DESC";

		$rs = mysqli_query($conn, $sql);

		desconectar($conn);

		return $rs;

	}


	if(isset($_GET["id"])) {


		updateMessage($_GET["id"]);

		$rs = selectMessage($_GET["id"]);

		$row = mysqli_fetch_array($rs);

		echo "<p>Para ". $row["receiver"] ."</p>";
		echo "<p>Fecha de envio: ".$row["date"] ."</p>";
		echo "<p>Asunto del mensaje: ".$row["subject"]."</p>";
		echo "<p>Mensaje: ".$row["body"]."</p>";

	}

	function selectMessage($id) {

		$conn = conectar("msg");

		$sql = "SELECT body, message.date, receiver, subject FROM message WHERE idmessage = '$id' ";

		$rs =  mysqli_query($conn, $sql);

		desconectar($conn);

		return $rs;

	}

	function updateMessage($id) {

		$conn = conectar("msg");

		$sql = "UPDATE message SET message.read = 1 WHERE idmessage = '$id' ";

		mysqli_query($conn, $sql);

		desconectar($conn);

	}

	function getSentMessages($sender) {

		$conn = conectar("msg");

		$sql = "SELECT * FROM message WHERE sender = '$sender' ORDER BY date DESC";

		$rs = mysqli_query($conn, $sql);

		desconectar($conn);
		
		return $rs;

	}

	function getSentMessagesLimit($sender, $from, $to) {

	$conn = conectar("msg");

	$sql = "SELECT * FROM message WHERE sender = '$sender' ORDER BY date DESC LIMIT $from,$to ";

	$rs = mysqli_query($conn, $sql);

	desconectar($conn);
	
	return $rs;

	}

	function getAllMessages() {

		$conn = conectar("msg");

		$sql = "SELECT * FROM message";

		$rs = mysqli_query($conn, $sql);

		desconectar($conn);

		return $rs;

	}

	function getAllMessagesLimit($from, $to) {

	$conn = conectar("msg");

	$sql = "SELECT * FROM message LIMIT $from,$to ";

	$rs = mysqli_query($conn, $sql);

	desconectar($conn);
	
	return $rs;

	}

?>