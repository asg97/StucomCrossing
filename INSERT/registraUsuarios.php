<?php

session_start();

if(!isset($_SESSION["theboss"])) header("Location: login.php");

$userName = $_SESSION["theboss"];

//printa

$title = "Registrar un usuario";

$content = 	'<fieldset>
						<legend>Registrar un usuario</legend>
						<form action="" method="post">	
							<label>Nombre de usuario: 
								<input type="text" name="userName" autofocus required>
							</label>
							<label>Nombre real: 
								<input type="text" name="realName" required>
							</label>
							<label>Apellido: 
								<input type="text" name="surName" required>
							</label>
							<label>Contraseña: 
								<input type="password" name="pass" required>
							</label>
							<label>Tipo de usuario:  
								<select name="userType" required>
									<option value="1">1 = Admin</option>
									<option value="0">0 = Usuario normal</option>
								</select>
							</label>
							<input type="submit" value="Registrar" name="registrar">
						</form>';

if(isset($_POST["registrar"])) {

	require_once("../INDEX/registra.php");
	$userName = $_POST["userName"];
	$realName = $_POST["realName"];
	$pass = $_POST["pass"];
	$surName = $_POST["surName"];
	$userType = $_POST["userType"];

	if(verificarUserName($userName))

		$content .= "<p>Ese nombre de usuario ya existe, escoge otro.</p>";

	else {

		registraUsuarioAdmin($userName, $pass, $realName, utf8_decode($surName), $userType);

		$content .= "<p>Usuario $userName registrado exitosamente.</p>";

	}


}

$content	.=	 '<a class="volver-menu" href="../INDEX/adminPage.php">Volver al panel de control</a>
					</fieldset>';

require_once("../template.php");