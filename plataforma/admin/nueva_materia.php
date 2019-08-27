<?php 
session_start();
include 'permisos_admin.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();

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
				<h2>Diligencie los siguientes datos para crear una nueva materia:</h2>
				<div class="span">Datos materia</div><br>
				<div class="form">
					<form action="validar/nueva_materia.php" method="POST">
						<label>Coloque el nombre de la materia/s: </label>
						<input type="text" name="nombre1" class="materias">
						<div class="materiasinput" id="materiasinput"></div>
						<!--<button type="button" class="button-submit-green" onclick="other()" style="width: 100%;">+</button>-->
						<input type="text" name="numero" style="width: 30px; border: none; display: none;" id="number" value="1">
						<input type="submit" value="Agregar materia" class="button-submit-green" onclick="materiasubmit()">
					</form>
				</div>
			</div>
		</div>
	</div>
<style>
	button[type=button]{
		width: 100%;
		height: 30px;
		border: none;
		margin-bottom: 10px;
		cursor: pointer;
		color: #ffffff;
		font-weight: bold;
	}
</style>
<script type="text/javascript" src="botones.js"></script>
<script>
	function other(){
		var inputlenght = document.getElementsByClassName('materias').length;
		var inputnumber = document.getElementById('number');
		console.log(inputlenght);
		var contador = inputlenght + 1;
		inputnumber.value = contador;
		var divmaterias = document.getElementById('materiasinput');
		divmaterias.innerHTML += "<input type='text' name='nombre"+contador+"' class='materias'>"
	}
</script>
</body>
</html>