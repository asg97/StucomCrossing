<?php if($_SERVER["PHP_SELF"] == "/PHP/StucomMail/SELECT/listadoMensajes.php") $body_height = "height-modified" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="../template.css">
	<link href="https://fonts.googleapis.com/css?family=Nixie+One" rel="stylesheet">
	<link href="https://file.myfontastic.com/PNDAqk9wjzk9rDSKPMCiPn/icons.css" rel="stylesheet">
</head>
<body <?php if(isset($body_height)) echo "class='$body_height'" ?> >
	<div class="wrapper">
		<?php echo $content; ?>
	</div>
</body>
</html>