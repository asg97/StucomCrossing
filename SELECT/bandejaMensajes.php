<?php 

	session_start();

	require_once("../INDEX/messageFunctions.php");
	require_once("../INDEX/logea.php");


	$fecha = date("Y-m-d H:i:s");


	if(!isset($_SESSION)) header("Location: ../INDEX/login.php");

	$userName = (isset($_SESSION["theboss"])) ? $_SESSION["theboss"] : $_SESSION["normalete"];

	$back_din = (isset($_SESSION["theboss"])) ? "../INDEX/adminPage.php" : "../INDEX/userPage.php";

	registraEvento($userName, $fecha, "C");

	$listaMensajes = getMessages($userName);

	$title = "Consulta de mensajes";

	// si no tiene mensajes -- ini
	if(mysqli_num_rows($listaMensajes) < 1):


		$content = "<fieldset>
							<legend>Bandeja de entrada - $userName</legend>
							<h1>No tienes ningún mensaje en tu bandeja de entrada :(</h1>
							<a href='$back_din' class='volver-menu'>Volver al panel de control</a>
		 				</fieldset>";

	// si no tiene mensajes -- end

	// si tiene mensajes -- ini 				
	else:


		$content = "<fieldset>
						<legend>Bandeja de entrada - $userName</legend>
						<table>
							<tr>
								<th>De</th>
								<th>Fecha/Hora</th>
								<th>Asunto</th>
								<th>Estado</th>
								<th>Acción</th>
							</tr>";

		while($row = mysqli_fetch_array($listaMensajes)):
			$content .= "<tr>";
				$content .= "<td class='sender'>".$row["sender"]."</td>";
				$content .= "<td>".$row["date"]."</td>";
				$content .= "<td>".$row["subject"]."</td>";
				$content .= ($row["read"] == 0) ? "<td class='read'>No Léido</td>" : "<td>Leído</td>";
				$content .= "<td><a class='cta-ver' data-message='".$row["idmessage"]."'>Ver mensaje</a></td>";
			$content	.=	"</tr>";
		endwhile;

		$content .=	"</table>	
						<a href='$back_din' class='volver-menu'>Volver al panel de control</a>
		
		 					<p class='prueba'></p> 
		 				</fieldset>";



	endif;
	// si tiene mensajes -- end

	require_once("../template.php");


?>

<script>
		let sender = document.querySelector(".sender").textContent;
		let cta = document.querySelectorAll(".cta-ver"),
			 id, btnClose = document.querySelector(".btnClose");

		[].forEach.call(cta, function(button) {

				button.addEventListener('click', function() {
					id = this.getAttribute('data-message');
					this.parentNode.previousElementSibling.textContent = "Leído";
				

				//modalini
						let modalWindow = document.createElement("div");
							 modalWindow.className = "mensajePopup";

						let modalWindowChild = document.createElement("div");
							 modalWindowChild.className = "mensajeText";

						let btnClose = document.createElement("a");
							 btnClose.className = "btnClose icon-x";

						let fieldSet = document.createElement("fieldset");
						let legend = document.createElement("legend");
							 legend.textContent = "De " + sender;

						let responseContainer = document.createElement("div");
							 responseContainer.className = "response";

							 // appends pertinetentes al fieldset le añadimos el legend y el div con el responseText
							 fieldSet.appendChild(legend)
							 fieldSet.appendChild(responseContainer);

							 // al modalWindowChild le añadimos el btnClose y el fieldSet

							 modalWindowChild.appendChild(fieldSet);
							 modalWindowChild.appendChild(btnClose);

							 // al modalWindow le añadimos el modalWindowChild

							 modalWindow.appendChild(modalWindowChild);

							 // añadimos modalWindow al body
							 document.body.appendChild(modalWindow);
							 modalWindow.style.display = "flex";


						btnClose.addEventListener('click', function(){
							document.body.removeChild(modalWindow);
						})
						

				//modalend

				let xhr = new XMLHttpRequest(),
					 url = "../INDEX/messageFunctions.php?id="+id;

				xhr.onreadystatechange = function() {

						if(this.readyState === 4 && this.status === 200) {

								document.querySelector(".response").innerHTML = this.responseText;

						}


				}


				xhr.open('POST', url, true);
				xhr.send();

				})



		})


</script>