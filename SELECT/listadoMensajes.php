<?php 

	session_start();

	require_once("../INDEX/messageFunctions.php");

	
	if(!isset($_SESSION["theboss"])) header("Location: login.php");

	$userName = $_SESSION["theboss"];

	// solo para obtener las variables de total páginas, registro
	$rowsTotal = getAllMessages();
	;

	//paginación ini
	if(isset($_GET["pag"])):
		$initPage = $_GET["pag"];
	else:
		$initPage = 1;
	endif;

	//num de registros que quiero que se muestren por pagina
	$maxRows = 15;
	
	$fromPage = ($initPage - 1) * $maxRows;
	$totalRows = mysqli_num_rows($rowsTotal);

	// Esta es la buena
	$rowsLimit = getAllMessagesLimit($fromPage, $maxRows);

	// da numero de páginas que habrán y ceil redonde hacía arriba
	$totalPages = ceil($totalRows / $maxRows);
	//paginación end

	//printa

	$title = "Listado de mensajes";


	$content = "<fieldset>
						<legend>Listado de mensajes</legend>
						<table>
							<tr>
								<th>Emisor</th>
								<th>Receptor</th>
								<th>Fecha - Hora</th>
								<th>Asunto</th>
								<th>Estado</th>
							</tr>";

						while($row = mysqli_fetch_array($rowsLimit)):
							$content .= "<tr>";
								$content .= "<td>".$row["sender"]."</td>";
								$content .= "<td>".$row["receiver"]."</td>";
								$content .= "<td>".$row["date"]."</td>";
								$content .= "<td>".$row["subject"]."</td>";
								$content .= ($row["read"] == 0) ? "<td>No Leído</td>" : "<td>Leído</td>";
							$content	.=	"</tr>";
						endwhile;


	$content .= "	</table>
						<a href='../INDEX/adminPage.php' class='volver-menu'>Volver al panel de control</a>";
						if($totalRows > $maxRows):
	$content .= "	<p class='p-left'>Mostrando página $initPage de $totalPages</p>";
						
	$content .=   "<div class='paginacion-container p-left'>";
						
							for ($i=1; $i <= $totalPages ; $i++):						
									$content .= "<a class='paginacion' href='?pag=".$i."'>$i</a>";
							endfor;

	$content .= "	</div>";
						endif;
	$content .= "</fieldset>";

	require_once("../template.php");

?>