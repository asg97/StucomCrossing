<?php

session_start();



if(!isset($_SESSION["theboss"])) header("Location: login.php");

$userName = $_SESSION["theboss"];

//printa

$title = "Página de administrador";

$content = "<fieldset>
					<legend>Página de $userName</legend>
					<a class='opciones' href='../UPDATE/cambiaPass.php'>Cambiar contraseña</a>
					<a class='opciones' href='../INSERT/enviaMensaje.php'>Enviar mensaje</a>
					<a class='opciones' href='../SELECT/bandejaMensajes.php'>Bandeja de entrada</a>
					<a class='opciones' href='../SELECT/mensajesEnviados.php'>Ver mensajes enviados</a>
					<a href='logout.php' class='volver-menu'>Cerrar sesión</a>
					<h2 class='adminPanel'>Opciones de Administrador</h2>
					<a class='opciones' href='../SELECT/listadoUsuarios.php'>Ver listado de usuarios registrados</a>
					<a class='opciones' href='../INSERT/registraUsuarios.php'>Registrar un usuario</a>
					<a class='opciones' href='../DELETE/eliminaUsuarios.php'>Eliminar un usuario</a>
					<a class='opciones' href='../SELECT/listadoMensajes.php'>Ver listado de mensajes</a>
					<a class='opciones' href='../SELECT/verFechaInicioSesion.php'>Ver la fecha de inicio de sesión por usuario</a>
					<a class='opciones' href='../SELECT/rankingUsuarios.php'>Ranking de usuarios por cantidad de mensajes enviados</a>
				</fieldset>";


require_once("../template.php");







