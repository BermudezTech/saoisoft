<?php 
session_start();
include 'permisos_profesor.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();
//include 'permisos_admin.php';

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
					<form method="POST" enctype="multipart/form-data" action="validar/actualizar_miinfo.php">
						<?php 
						$id = $_SESSION['id'];
							$sq = $conexion -> prepare("SELECT * FROM usuario WHERE id='$id'");
							$sq -> execute();
							while ($consulta = $sq -> fetch()) {
						?>
						<h4>Datos de usuario</h4><br>
						<div class="span">Mi informacion</div><br>
						<label>Identificacion:</label>
						<input type="text" name="id" disabled="true" value="<?php echo $consulta['id'] ?>">
						<label>Nombres:</label>
						<input type="text" name="nombres" value="<?php echo $consulta['nombres'] ?>">
						<label>Apellidos:</label>
						<input type="text" name="apellidos" value="<?php echo $consulta['apellidos'] ?>">
						<label>Email:</label>
						<input type="email" name="email" value="<?php echo $consulta['email'] ?>">
						<label>Lugar de nacimiento:</label>
						<input type="text" name="ln" value="<?php echo $consulta['lugar_nacimiento'] ?>">
						<label>Fecha de nacimiento:</label>
						<input type="text" name="fn" value="<?php echo $consulta['fecha_nacimiento'] ?>">
						<label>Direccion:</label>
						<input type="text" name="direccion" value="<?php echo $consulta['direccion'] ?>">
						<label>Telefono:</label>
						<input type="text" name="telefono" value="<?php echo $consulta['telefono'] ?>">
						<input type="submit" value="Guardar cambios" class="button-submit-green">
						<?php
							}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
	<style type="text/css">
		#imagePreview2 img{
			width: 30%;
		}
	</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="botones.js"></script>
</body>
</html>