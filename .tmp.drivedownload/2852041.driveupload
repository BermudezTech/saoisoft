<?php 
session_start();
include 'permisos_profesor.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();
$examen = $_REQUEST['examen'];
$st = $conexion -> prepare("SELECT * FROM exam WHERE id='$examen'");
$st -> execute();
$exameninfo = $st -> fetch();

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
				<h1><?php echo $exameninfo['nombre'] ?></h1>
				<div class="span">Vista previa</div>
				<style>
					textarea{
						width: 100%;
						height: 80px;
						resize: none;
						padding: 5px;
						box-sizing: border-box;
					}
				</style>
				<?php 
				$st = $conexion -> prepare("SELECT * FROM question WHERE examen='$examen'");
				$st -> execute();
				$contador = 1;
				while ($preguntas = $st -> fetch()) {
?>
<br><br><h4><?php echo $contador ?>. <?php echo $preguntas['pregunta'] ?></h4><br>
<?php
if ($preguntas['tipo']==1) {
?>
<textarea name="<?php echo $preguntas['id'] ?>"></textarea>
<?php
}else{
	$pid = $preguntas['id'];
	$st2 = $conexion -> prepare("SELECT * FROM answer WHERE question = '$pid' && estado=1");
	$st2 -> execute();
	$respuestacorrecta=$st2->fetch();
?>
<input type="radio" id="respuesta1"><label for="respuesta1"><?php echo $respuestacorrecta['respuesta'] ?></label>
<?php
}
$contador++;
				}

				 ?>
			</div>
		</div>
	</div>
<script type="text/javascript" src="botones.js"></script>
</body>
</html>