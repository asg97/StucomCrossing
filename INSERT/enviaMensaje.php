<?php 

session_start();

require_once("../INDEX/userFunctions.php");
require_once("../INDEX/logea.php");

$fecha = date("Y-m-d H:i:s");


if(!isset($_SESSION)) header("Location: ../INDEX/login.php");

$userName = (isset($_SESSION["theboss"])) ? $_SESSION["theboss"] : $_SESSION["normalete"];

$back_din = (isset($_SESSION["theboss"])) ? "../INDEX/adminPage.php" : "../INDEX/userPage.php";

$rows = listaUsuarios($userName);

$title = "Enviar un mensaje";

$content = "<fieldset>
					<legend>Envio de mensajes - $userName</legend>
					<form action='' method='post'>
						<label>Escoge el usuario 
							<select name='listaUsuarios' required>
								<option value=''>- - -</option>";
							
							while($row = mysqli_fetch_array($rows)):
									$content .= "<option value='".$row["username"]."'>".$row["username"]."</option>";
							endwhile;


$content	.=	"			</select>
						</label>
						<label>Asunto
							<input type='text' name='mensajeAsunto' required>
						</label>
						<label>
							<textarea name='mensajeTexto' placeholder='Escribe tu mensaje..' required></textarea>
						</label>
						<input type='submit' value='Enviar' name='enviar'>
					</form>";


if (isset($_POST["enviar"])) {
	
	$receiver = $_POST["listaUsuarios"];
	$subject = $_POST["mensajeAsunto"];
	$mensajeTexto = $_POST["mensajeTexto"];

	if(enviaMensaje($userName, $receiver, $fecha, $subject, $mensajeTexto)):
		$content .= "<p>Mensaje enviado con exito a $receiver.</p>";
		registraEvento($userName, $fecha, "R");
	else:
		$content .= "<p>Ha ocurrido algún error. Por favor intentalo de nuevo más tarde.</p>";
	endif;

}

$content .=	"	<a href='$back_din' class='volver-menu'>Volver al panel de control</a>
 				</fieldset>";


require_once("../template.php");


?>