<?php

session_start();


if(!isset($_SESSION["theboss"])) header("Location: login.php");

$userName = $_SESSION["theboss"];

//printa

$title = "Listado de usuarios";

$content .= '<fieldset>
					<legend>Listado de usuarios</legend>
					<form action="#" method="post">
						
					</form>


				</fieldset>';


//require_once("../template.php");