<?php

session_start();

require_once("../INDEX/userFunctions.php");
$rows = listaUsuarios();

if(!isset($_SESSION["theboss"])) header("Location: login.php");

$userName = $_SESSION["theboss"];

//printa

$title = "Listado de usuarios";

$content = '<fieldset>
					<table>
						<tr>
							<th>Nombre de usuario</th>
							<th>Contraseña</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Tipo</th>
						</tr>';

						while($row = mysqli_fetch_array($rows)):

							$content .= '<tr>';
												$content .= '<td>'.$row["username"].'</td>';
												$content .= '<td>'.$row["password"].'</td>';
												$content .= '<td>'.$row["name"].'</td>';
												$content .= '<td>'.mb_convert_encoding($row["surname"], "UTF-8", "ISO-8859-1").'</td>';
												$content .= '<td>'.$row["type"].'</td>';
							$content .= '</tr>';

						endwhile;
					
$content .=		'</table>
				<a href="../INDEX/adminPage.php" class="volver-menu">Volver al panel de control</a>
				</fieldset>';


require_once("../template.php");