<?php 


session_start();

if( isset( $_SESSION["normalete"] ) ): 

	header("Location: userPage.php");

elseif( isset( $_SESSION["theboss"] ) ):

	header("Location: adminPage.php");

else:

	$title = "Índice";

	$content = "<fieldset>
						<legend>Stucom Mail - Menu</legend>
						<a class='menu-opciones' href='registro.php'>Registro</a>
						<a class='menu-opciones' href='login.php'>Login</a>
					</fieldset>";
	
	require_once("../template.php");

endif;