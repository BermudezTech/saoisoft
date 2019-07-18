<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Configuracion Hosting</title>
	<link rel="stylesheet" href="../styles/botones.css">
	<link rel="stylesheet" href="../styles/main.css">
	<link rel="stylesheet" href="../styles/config.css">
</head>
<style>
	body{
		background-image: url(https://www.tecnoblog.info/wp-content/uploads/2017/10/Como-cambiar-la-IP-de-vinculacion-de-MySQL-Server-en-Linux-www.tecnoblog.info_-1024x576.jpg);
		background-size: cover;
	}
</style>
<body>
	<div class="contenedor">
		<div class="formulario">
			<h1>Bienvenido a SAOI-Soft Co.</h1>
			<p>Diligencie primero los siguientes datos:</p>
			<form action="upload_host_config.php" method="POST">
				<input type="text" placeholder="MySQL host" name="host"><br><br>
				<input type="text" placeholder="MySQL username" name="username"><br><br>
				<input type="text" placeholder="MySQL password" name="password"><br><br>
				<input type="text" placeholder="MySQL database" name="database"><br><br>
				<input type="submit" value="Ingresar" class="button-submit-green">
			</form>
		</div>		
	</div>
</body>
</html>