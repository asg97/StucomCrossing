<?php 

	
	$title  = "Login";

	$content = "<fieldset>
						<legend>Login</legend>
						<form action='login.php' method='post'>
							<label>
								Nombre de usuario
								<input type='text' name='userName' required>
							</label>
							<label>
								Contraseña
								<input type='password' name='userPass' required>
							</label>
							<input type='submit' value='Login'>
						</form>		
						<a class='volver-menu' href='index.php'>Volver al menu</a>
					</fieldset>";


	require_once("../template.php");

	$fecha = date("Y-m-d H:i:s");
	
	if(isset($_POST["logear"])) {





	}
