<?php 

	$title = "Registro";

	$content = 	'<fieldset>
						<legend>Registro</legend>
						<form action="" method="post">	
							<label>Nombre de usuario: 
								<input type="text" name="userName">
							</label>
							<label>Nombre real: 
								<input type="text" name="realName">
							</label>
							<label>Apellido: 
								<input type="text" name="surName">
							</label>
								

							<label>Contraseña: 
								<input type="password" name="pass">
							</label>
							<input type="submit" value="Registrar" name="registrar">
						</form>';

	if(isset($_POST["registrar"])) {

		require_once("registra.php");
		$userName = $_POST["userName"];
		$realName = $_POST["realName"];
		$pass = $_POST["pass"];
		$surName = $_POST["surName"];

		if(verificarUserName($userName))

			$content .= "<p>Ese nombre de usuario ya existe, escoge otro.</p>";

		else {

			registrarUsuario($userName, $pass, $realName, utf8_decode($surName));

		}

	}

	$content	.=	 '</fieldset>';



	$fecha = date("F j, Y, g:i a");
	
	require_once("../template.php");

?>
