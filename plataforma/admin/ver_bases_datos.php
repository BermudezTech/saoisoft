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
				<div class="form">
					<form action="">
						<h4>Seleccione la base de datos que quiere ver: </h4><br>
						<input type="radio" name="db" value="1" id="1" style="width: 20px; height: 10px;" onclick="validarchk()"><label for="1">cursos</label><br>
						<input type="radio" name="db" value="2" id="2" style="width: 20px; height: 10px;" onclick="validarchk()"><label for="2">datos_institucion</label><br>
						<input type="radio" name="db" value="3" id="3" style="width: 20px; height: 10px;" onclick="validarchk()"><label for="3">materias</label><br>
						<input type="radio" name="db" value="4" id="4" style="width: 20px; height: 10px;" onclick="validarchk()"><label for="4">relestudiantepadre</label><br>
						<input type="radio" name="db" value="5" id="5" style="width: 20px; height: 10px;" onclick="validarchk()"><label for="5">relestudiantesalon</label><br>
						<input type="radio" name="db" value="6" id="6" style="width: 20px; height: 10px;" onclick="validarchk()"><label for="6">relprofesorcursos</label><br>
						<input type="radio" name="db" value="7" id="7" style="width: 20px; height: 10px;" onclick="validarchk()"><label for="7">salon</label><br>
						<input type="radio" name="db" value="8" id="8" style="width: 20px; height: 10px;" onclick="validarchk()"><label for="8">usuario</label><br>
												<input type="text" name="query" id="query" placeholder="Buscar" style="width: 90%; border: 1px solid #000000" onkeyup="busquedadbs()">
						<button type="button" style="padding: 0; width: 30px;height: 30px;border: 1px solid #B8B8B8; cursor: pointer; border-radius: 7px;" >🔎</button>
						<div class="data" id="data"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="botones.js"></script>
<script type="text/javascript" src="mostrar_db.js"></script>
</body>
</html>