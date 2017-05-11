<?php

session_start();



if(!isset($_SESSION["theboss"])) header("Location: login.php");

$userName = $_SESSION["theboss"];

//printa

$title = "Página del administrador";

$content = "<fieldset>
					<legend>Página de $userName</legend>
					<a href='logout.php' class='cerrar-session volver-menu'>Cerrar sesión</a>
					<a href='../UPDATE/cambiaPass.php'>Cambiar contraseña</a>
					<a href='enviaMensaje.php'>Enviar mensaje</a>
					<a href='bandejaMensajes.php'>Bandeja de entrada</a>
					<a href='mensajesEnviados.php'>Ver mensajes enviados</a>
					<a href='logout.php' class='volver-menu'>Cerrar sesión</a>
					<h2>Opciones de Administrador</h2>
					<a href='../SELECT/listadoUsuarios.php'>Ver listado de usuarios registrados</a>
					<a href='../INSERT/registraUsuarios.php'>Registrar un usuario</a>
					<a href='../DELETE/eliminaUsuarios.php'>Eliminar un usuario</a>
					<a href='../SELECT/listadoMensajes.php'>Ver listado de mensajes</a>
					<a href='..SELECT/verFechaInicioSesion.php'>Ver la fecha de inicio de sesión por usuario</a>
					<a href='../SELECT/rankingUsuarios.php'>Ranking de usuarios por cantidad de mensajes enviados</a>
				</fieldset>";


require_once("../template.php");







