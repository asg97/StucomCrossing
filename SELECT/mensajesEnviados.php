<?php 

	session_start();

	require_once("../INDEX/messageFunctions.php");



	$userName = (isset($_SESSION["theboss"])) ? $_SESSION["theboss"] : $_SESSION["normalete"];

	// solo para obtener las variables de total páginas, registro
	$rowsTotal = getSentMessages($userName);
	

	$back_din = (isset($_SESSION["theboss"])) ? "../INDEX/adminPage.php" : "../INDEX/userPage.php";

	//paginación ini
	if(isset($_GET["pag"])):
		$initPage = $_GET["pag"];
	else:
		$initPage = 1;
	endif;

	//num de registros que quiero que se muestren por pagina
	$maxRows = 10;
	
	$fromPage = ($initPage - 1) * $maxRows;
	$totalRows = mysqli_num_rows($rowsTotal);

	// Esta es la buena
	$rowsLimit = getSentMessagesLimit($userName, $fromPage, $maxRows);

	// da numero de páginas que habrán y ceil redonde hacía arriba
	$totalPages = ceil($totalRows / $maxRows);
	//paginación end

	//printa

	$title = "Mensajes enviados";


	$content = "<fieldset>
						<legend>Mensajes enviados - $userName</legend>
						<table>
							<tr>
								<th>Receptor</th>
								<th>Fecha - Hora</th>
								<th>Asunto</th>
							</tr>";

						while($row = mysqli_fetch_array($rowsLimit)):
							$content .= "<tr>";
								$content .= "<td>".$row["receiver"]."</td>";
								$content .= "<td>".$row["date"]."</td>";
								$content .= "<td>".$row["subject"]."</td>";
							$content	.=	"</tr>";
						endwhile;


	$content .= "	</table>
						<a href=\"$back_din\" class='volver-menu'>Volver al panel de control</a>";
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