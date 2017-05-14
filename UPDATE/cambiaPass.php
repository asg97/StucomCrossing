<?php


session_start();

require_once("../INDEX/userFunctions.php");
require_once("../INDEX/logea.php");

if(!isset($_SESSION)) header("Location: ../INDEX/login.php");

$userName = (isset($_SESSION["theboss"])) ? $_SESSION["theboss"] : $_SESSION["normalete"];

$back_din = (isset($_SESSION["theboss"])) ? "../INDEX/adminPage.php" : "../INDEX/userPage.php";


//printa

$title = "Cambiar contraseña";


$content = "<fieldset>
					<legend>Cambio de contraseña - $userName</legend>
					<form action='' method='post'>
						<label for=''>Introduce tu contraseña actual
							<input type='password' name='currentPass' autofocus required>
						</label>
						<label>Introduce tu nueva contraseña
							<input type='password' name='newPass' required>
						</label>
						<label>Confirma tu nueva contraseña
							<input type='password' name='confirmNewPass' required>
						</label>";


$content .= "	<input type='submit' value='Cambiar contraseña' name='cambiar'>
					<a class='volver-menu' href='$back_din'>Volver al panel de control</a>
					</form>";

				if(isset($_POST["cambiar"])) {

					$currentPass = $_POST["currentPass"];
					$newPass = $_POST["newPass"];
					$confirmNewPass = $_POST["confirmNewPass"];

						if(verificarPass($userName, $currentPass)) {

								if($newPass !== $confirmNewPass) {

									$content .= "<p>Las nuevas contraseñas deben coincidir.</p>";

								} else {

									updatePass($userName, $newPass);
									$content .= "<p>Contraseña cambiada correctamente</p>";
								}

						} else {

							$content .= "<p>La contraseña actual no es correcta</p>";

						}

				}

$content .= "</fieldset>";



require_once("../template.php");