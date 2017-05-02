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
			// $content .= "<p>Usuario $userName registrado exitosamente.</p>";
			// $content .= "<p>Redirigiendo a la página de Login..en <span id='seconds'>5</span></p>";
			
		}

		

	}
	$content .= '<span id="seconds">5</span>';
	$content .= '<script> redirigePagina(); </script>';

	$content	.=	 '</fieldset>';



	$fecha = date("F j, Y, g:i a");
	
	require_once("../template.php");

?>


<script>

	
	function redirigePagina() {

		setInterval(function() {
		seconds = parseInt(document.querySelector("#seconds").textContent);
		seconds--;	            
      seconds.textContent = seconds;
      			     
  		}, 1000);

	}

</script>

