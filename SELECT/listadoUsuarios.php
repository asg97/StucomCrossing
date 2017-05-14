<?php

session_start();

require_once("../INDEX/userFunctions.php");

if(!isset($_SESSION["theboss"])) header("Location: login.php");

$userName = $_SESSION["theboss"];

$rows = listaUsuarios($userName);
//printa

$title = "Listado de usuarios";

$content = '<fieldset>
					<legend>Listado de usuarios registrados</legend>
					<table>
						<tr>
							<th>Nombre de usuario</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Tipo</th>
						</tr>';

						while($row = mysqli_fetch_array($rows)):

							$content .= '<tr>';
												$content .= '<td>'.$row["username"].'</td>';
												$content .= '<td>'.$row["name"].'</td>';
												$content .= '<td>'.mb_convert_encoding($row["surname"], "UTF-8", "ISO-8859-1").'</td>';
												$content .= ($row["type"] == 0) ? "<td>Usuario</td>" : "<td>Administrador</td>";
							$content .= '</tr>';

						endwhile;
					
$content .=		'</table>
				<a href="../INDEX/adminPage.php" class="volver-menu">Volver al panel de control</a>
				</fieldset>';


require_once("../template.php");