<?php 
session_start();
include 'permisos_profesor.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();
$sq = $conexion -> prepare("SELECT * FROM exam ORDER BY id DESC");
$sq -> execute();
$examen = $sq -> fetch();
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
				<h1><?php echo $examen['nombre'] ?></h1>
				<div class="form"><br>
					<div class="span">Crear examen</div><br>
					<label>Crear pregunta:</label><br><br>
					<button class="examselection" onclick="abierta()">Abierta</button>
					<button class="examselection" onclick="cerrada()">Seleccion multiple</button>
					<style type="text/css">
						.examselection{
							border: none;
							cursor: pointer;
							padding: 10px;
							color: #ffffff;
							background-color: <?php echo $fila['color2'] ?>;
							box-sizing: border-box;
						}
						.examselection:hover{
							opacity: 0.7;
						}
						textarea{
							width: 100%;
							resize: none;
							padding: 5px;
							box-sizing: border-box;
							height: 100px;
						}
						#abierta{
							display: none;
						}
						#cerrada{
							display: none;
						}
					</style><br>
					<div id="abierta">
					<br><label>Pregunta:</label><textarea></textarea></div>
					<div id="cerrada"><br><br><label>Pregunta:</label><br><textarea></textarea><br><br><label>Respuesta correcta</label><input type="text" name="correcta"><br><hr><br><label>Respuesta adicional</label><input type="text" name="adicional1"><br><label>Respuesta adicional</label><input type="text" name="adicional2"><br><label>Respuesta adicional</label><input type="text" name="adicional3"></div>
				</div>	
			</div>
		</div>
	</div>
<script type="text/javascript" src="botones.js"></script>
<script type="text/javascript">
	function abierta(){
		document.getElementById('cerrada').style.display='none';
		document.getElementById('abierta').style.display='block';
	}
	function cerrada(){
		document.getElementById('abierta').style.display='none';
		document.getElementById('cerrada').style.display='block';
	}
</script>
</body>
</html>