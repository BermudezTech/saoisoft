<?php 
session_start();
include 'permisos_profesor.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();


 ?>
 <?php 

$id = $_SESSION['id'];
$sq = $conexion -> prepare("SELECT * FROM usuario WHERE id = '$id'");
$sq -> execute();
$usuario = $sq -> fetch();
$pass = $usuario['pass'];
if (isset($_REQUEST['pass'])) {
	if ($pass != $_REQUEST['pass']) {
		echo "No tiene permiso para entrar";
		die();
	}
}else{
	$location = "Location: changepass.php?usuario=" . $id . "&pass=" . $pass; 
	header($location);
}

  ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrador inicial</title>
	<link rel="stylesheet" href="../styles/main_app.css">
	<link rel="image/x-icon" href="../Finallogo.png">
</head>
<style type="text/css">
	 .header{
	 	background-color: <?php echo $fila['color1'] ?>;
	 }
	 .aside{
	 	background-color: <?php echo $fila['color2'] ?>;
	 }
	 .aside hr{
	 	color: <?php echo $fila['color3'] ?>;
	 }
	 .header .separador{
		color: <?php echo $fila['color3'] ?>;
	}
	.span{
		background-color: <?php echo $fila['color3'] ?>;
	}
</style>
<body>
	<div class="contenedor">
		<div class="header">
			<div class="izq">
				<?php include 'search_bar.php' ?>
			</div>
			
			<div class="botones">
				<?php include 'header.php' ?>
			</div>
		</div>
		<div class="body">
			<div class="aside">
				<?php include 'aside.php' ?>
			</div>
			<div class="main">
				<div class="menu" id="menu">
					<?php include 'menu.php' ?>
				</div>
				<!--

				CONTENIDO

				-->
 			<div class="form">
 				<form action="validar/updatepass.php?id=<?php echo $id ?>" method="POST">
 				<label>Escriba su nueva contraseña:</label>
 				<input type="password" name="pass1" id="pass1" onkeyup="myFunction()">
 				<label>Escriba su nueva contraseña de nuevo:</label>
 				<input type="password" name="pass2" id="pass2" onkeyup="myFunction()">
 				<div id="span2"></div>
 				<input type="submit" value="Cambiar mi contraseña" class="button-submit-green">
 				</form>
 		</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="botones.js"></script>
<style>
	.gif{
		width: 17px;
	}
</style>
 <script>
	var span = document.getElementById('span2');
	var pass = document.getElementById('pass1');
	var pass_2 = document.getElementById('pass2');
	function myFunction(){
		if (pass.value == pass_2.value) {
			span.style.color = 'green';
			span.innerHTML = 'Correcto';
		}else{
			span.style.color = 'red';
			span.innerHTML = '<img src="http://www.gifde.com/gif/otros/decoracion/cargando-loading/cargando-loading-041.gif" class="gif">No coinciden las contraseñas';
		}
	}	
</script>
</body>
</html>