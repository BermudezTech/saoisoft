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
				<h2>Diligencie la siguiente informacion para crear un curso:</h2>
				<div class="span">Informacion curso</div><br><br>
				<div class="form">
					<form action="validar/nuevo_curso.php" method="POST">
						<label>Coloque el grado:</label>
						<select name="grado" id="grado" onchange="myFunction()">
							<option value="0" onclick="grado()">Seleccione el grado</option>
							<?php 
							$st = $conexion -> prepare("SELECT * FROM grado ORDER BY id ASC");
							$st -> execute();
							while ($grado = $st->fetch()) {
							?>
								<option value="<?php echo $grado['id'] ?>" onclick="grado()"><?php echo $grado['nombre']; ?></option>
							<?php
							}
							 ?>
						</select>
						<label>Coloque el nombre del curso:</label>
						<input type="text" name="nombre" id="nombre">
						<input type="submit" value="Guardar" class="button-submit-green" onclick="cursosubmit()">
					</form>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="grados.js"></script>
<script type="text/javascript" src="botones.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>