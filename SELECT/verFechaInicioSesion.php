<?php 
	
	session_start();

	if(!isset($_SESSION["theboss"])) header("Location: login.php");

	$userName = $_SESSION["theboss"];

	require_once("../INDEX/userFunctions.php");
	$rows = getListaUserNames();
	$num_rows = mysqli_num_rows($rows);

	$title = "Ver fecha inicio sesión por usuario";

	if($num_rows > 0):

		$content = '<fieldset>
							<legend>Fecha de inicio de sesión por usuario</legend>
								<label>Escoge un usuario:
									<select name="listaUsuarios" id="listaUsuarios" required>
										<option>- - -</option>';
										while($row = mysqli_fetch_array($rows)):

											$content .= '<option value="'.$row["username"].'">'.$row["username"].'</option>';

										endwhile;


		$content .=				'</select>
								</label>';

		$content .= '<p class="response"></p>';


		$content .= 	'<a class="volver-menu" href="../INDEX/adminPage.php">Volver al panel de control</a>
						</fieldset>';

	else:

				$content = '<fieldset>
									<legend>Fecha de inicio de sesión por usuario</legend>
									<h1>No hay usuarios registrados</h1>';



				$content .= 	'<a class="volver-menu" href="../INDEX/adminPage.php">Volver al panel de control</a>
								</fieldset>';

	endif;


require_once("../template.php");


?>


<script>
	

		let selectEl = document.querySelector("#listaUsuarios");

		selectEl.addEventListener('change', function() {

			let optionValue = this.value;

			let xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function () {
				
				if(optionValue !== "- - -") {

					if(this.readyState === 4 && this.status === 200) {

							document.querySelector(".response").innerHTML = this.responseText;
				
					}

				} else {

					document.querySelector(".response").innerHTML = "Escoge un usuario";

				}

			}

			let url = "../INDEX/userFunctions.php?u="+optionValue;

			xhr.open('GET', url, true);
			xhr.send();


		})

</script>