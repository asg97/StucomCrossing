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
							<input type='submit' value='Login' name='logear'>
						</form>		
						<a class='volver-menu' href='index.php'>Volver al menu</a>";




		require_once ("logea.php");

		$fecha = date("Y-m-d H:i:s");

		if(isset($_POST["logear"])) {

				$userName = $_POST["userName"];
				$userPass = $_POST["userPass"];

				if(verificarPass($userName, $userPass))  {

					session_start();

					switch(getTypeOfUser($userName)) {
						case 0:
							$_SESSION["normalete"] = $userName;
							header("Location: userPage.php");
							break;
						case 1:
							$_SESSION["theboss"] = $userName;
							header("Location: adminPage.php");
							break;
					}

				} else {
					$content .= "<p>Usuario o contraseña son incorrectos</p>";
				}




		}


	$content .= "</fieldset>";






require_once("../template.php");