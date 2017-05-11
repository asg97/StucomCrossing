<?php

	$title = "Registro";

	$content = 	'<fieldset>
						<legend>Registro</legend>
						<form action="" method="post">	
							<label>Nombre de usuario: 
								<input type="text" name="userName" required>
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
			$content .= "<p>Usuario $userName registrado exitosamente.</p>";
			$content .= '<p>Redirigiendo a la página de login en <span id="seconds">3</span>..</p>';
			$content .= '<script>

								var seconds = document.querySelector("#seconds").innerHTML;
						
								var int = setInterval(function(){
									seconds--;
									document.querySelector("#seconds").innerHTML = seconds;
						
									if(seconds < 1) {
										window.location.href = "login.php";
										clearInterval(int);
										document.querySelector("#seconds").innerHTML = "";
									}
								}, 1000)

							</script>';
				}

		

	}

	$content	.=	 '<a class="volver-menu" href="index.php">Volver al panel de control</a>
					</fieldset>';
	
	require_once("../template.php");









