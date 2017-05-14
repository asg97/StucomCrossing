<?php 
	
	session_start();

	if(!isset($_SESSION["theboss"])) header("Location: login.php");

	$userName = $_SESSION["theboss"];

	require_once("../INDEX/userFunctions.php");
	$rows = rankingUsuarios();
	$num_rows = mysqli_num_rows($rows);

	$title = "Ranking de usuarios";

	if($num_rows > 0):

		$content = '<fieldset>
							<legend>Fecha de inicio de sesión por usuario</legend>
							<table>
								<tr>
									<th>Usuario</th>
									<th>Mensajes enviados</th>
								</tr>';
								
								while($row = mysqli_fetch_array($rows)):
									$content .= '<tr>';
										$content .= '<td>'.$row["sender"].'</td>';
										$content .= '<td>'.$row["enviados"].'</td>';
									$content .= '<tr>';
								endwhile;					

		$content .= 	'</table>	
							<a class="volver-menu" href="../INDEX/adminPage.php">Volver al panel de control</a>
						</fieldset>';

	else:

				$content = '<fieldset>
									<legend>Fecha de inicio de sesión por usuario</legend>
									<h1>No hay usuarios registrados</h1>';



				$content .= 	'<a class="volver-menu" href="../INDEX/adminPage.php">Volver al panel de control</a>
								</fieldset>';

	endif;


require_once("../template.php");