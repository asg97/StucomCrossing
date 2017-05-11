<?php

session_start();



if(!isset($_SESSION["normalete"])) header("Location: login.php");

$userName = $_SESSION["normalete"];

//printa

$title = "Página de usuario";

$content = "<fieldset>
					<legend>Página de $userName</legend>
					<a href='../UPDATE/cambiaPass.php'>Cambiar contraseña</a>
					<a href='enviaMensaje.php'>Enviar mensaje</a>
					<a href='bandejaMensajes.php'>Bandeja de entrada</a>
					<a href='mensajesEnviados.php'>Ver mensajes enviados</a>
					<a href='logout.php' class='volver-menu'>Cerrar sesión</a>
				</fieldset>";


require_once("../template.php");