<?php

session_start();

require_once("../INDEX/userFunctions.php");
$rows = getListaUserNames();
$num_rows = mysqli_num_rows($rows);


if(!isset($_SESSION["theboss"])) header("Location: ../INDEX/login.php");

$userName = $_SESSION["theboss"];

//printa

$title = "Eliminar un usuario";

if($num_rows > 0):
$content = '<fieldset>
					<legend>Eliminar un usuario</legend>
					<form action="" method="post">
						<label>Nombre de usuario:
							<select name="listaUsuarios" id="listaUsuarios" required>
								<option>- - -</option>';
								while($row = mysqli_fetch_array($rows)):

									$content .= '<option value="'.$row["username"].'">'.$row["username"].'</option>';

								endwhile;


$content .=				'</select>
						</label>
						<input type="submit" value="Eliminar" id="borrar">';

$content .= '<p class="response"></p>';


$content .= 	'<a class="volver-menu" href="../INDEX/adminPage.php">Volver al panel de control</a>
				</fieldset>';

else:

		$content = '<fieldset>
							<legend>Eliminar un usuario</legend>
							<h1>Te los cargaste a todos wey</h1>';



		$content .= 	'<a class="volver-menu" href="../INDEX/adminPage.php">Volver al panel de control</a>
						</fieldset>';

endif;


require_once("../template.php");


?>

<script>

	if(document.querySelector("#listaUsuarios") !== null) {

		var  indexValor;
		var select = document.querySelector("#listaUsuarios");
		var valor;
		var boton = document.querySelector("#borrar");
		var responseDiv = document.querySelector(".response");

		select.addEventListener('change', function(){
			indexValor = this.selectedIndex;
			valor = this.options[this.selectedIndex].value;
		})


		boton.addEventListener('click', function(e) {
			e.preventDefault();
			ajaxRequest();

		})

		function ajaxRequest() {

				var xhr = new XMLHttpRequest(),
					 url = '../INDEX/userFunctions.php?n='+valor;

				xhr.onreadystatechange = function(){

					if(this.readyState === 4 && this.status === 200) {

							var optionSelected = document.querySelector("#listaUsuarios").options[indexValor];

							if(optionSelected !== undefined) {

									document.querySelector(".response").innerHTML = this.responseText;
									optionSelected.parentNode.removeChild(optionSelected);

							} else {
								responseDiv.innerHTML = '<p>Selecciona un usuario wey</p>';
							}



					}

				}

				xhr.open('POST', url, true);
				xhr.send();

		}


	}

</script>


