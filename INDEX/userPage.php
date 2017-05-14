<?php

	session_start();


	if(!isset($_SESSION["normalete"])) header("Location: login.php");

	$userName = $_SESSION["normalete"];


	//printa

	$title = "Página de usuario";

	$content = "<fieldset>
						<legend>Página de $userName</legend>
						<a class='opciones' href='../UPDATE/cambiaPass.php'>Cambiar contraseña</a>
						<a class='opciones' href='../INSERT/enviaMensaje.php'>Enviar mensaje</a>
						<a class='opciones' href='../SELECT/bandejaMensajes.php'>Bandeja de entrada</a>
						<a class='opciones' href='../SELECT/mensajesEnviados.php'>Ver mensajes enviados</a>
						<a href='logout.php' class='volver-menu'>Cerrar sesión</a>
					</fieldset>";


	require_once("../template.php");