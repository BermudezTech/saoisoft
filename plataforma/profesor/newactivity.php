<?php 
session_start();
include 'permisos_profesor.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();
if (isset($_REQUEST['tipo'])) {
	$tipo = $_REQUEST['tipo'];
}
if (isset($_REQUEST['actividadid'])) {
	$actividadid = $_REQUEST['actividadid'];
}
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
<body onload="newtask(<?php echo $tipo; ?>,<?php echo $actividadid; ?>)">
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
				<div class="menufunciones">
				<div class="span">Nueva actividad</div>
				<div class="botonesdiv">
					<button onclick="newtask(1,0)"><img src="../icons/profile.png">Examen</button>
					<button onclick="newtask(2,0)"><img src="../icons/info.png">Tarea</button>
					<button onclick="newtask(3,0)"><img src="../icons/multimedia.png">Multimedia</button>
				</div>
				</div>
				<div id="datos"></div>
			</div>
		</div>
	</div>
	<?php
$hex = $fila['color1'];
list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
$opacity = 0.5;
$rgcolor1 = "$r,$g,$b";
?>
<style>
	.menufunciones{
		margin-top: 10px;
		background-color: <?php echo $fila['color2'] ?>;
		padding: 5px;
	}
	.botonesdiv{
		box-sizing: border-box;
		display: flex;
		justify-content: space-around;
		padding: 5px;
	}
	.botonesdiv button{
		border: none;
		padding: 20px;
		box-sizing: border-box;
		cursor: pointer;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		color: #ffffff;
		font-weight: bold;
		background-image: linear-gradient(rgba(<?php echo $rgcolor1 ?>,0.8),rgba(<?php echo $rgcolor1 ?>,1));
	}
	.botonesdiv button:hover{
		background-image: linear-gradient(rgba(<?php echo $rgcolor1 ?>,0.5),rgba(<?php echo $rgcolor1 ?>,0.7));
	}
	.botonesdiv button img{
		height: 50px;
	}
</style>
<script>
	function newtask(tipo,actividadid){
		$.ajax({
		url: 'validar/new_task.php',
		type: "POST",
		data: { tipo: tipo,actividadid:actividadid},
		success: function(response){
			document.getElementById('datos').innerHTML = response;

		}
	});
	}
</script>
<script type="text/javascript" src="botones.js"></script>
</body>
</html>