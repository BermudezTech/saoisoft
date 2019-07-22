<?php 

include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();
session_start();
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
				<h1>Bienvenido administrador</h1>
				<h2>Puede realizar las siguientes funciones:</h2>
				<div class="menufunciones">
				<div class="span">Mi informacion: </div>
				<div class="botonesdiv">
					<button onclick="perfil()"><img src="../icons/profile.png">Mi perfil</button>
					<button onclick="mi_info()"><img src="../icons/info.png">Modificar mi informacion</button>
					<button onclick="changepass()"><img src="../icons/key.png">Cambiar mi contraseña</button>
					<button><img src="../icons/manual.png">Manual de usuario</button>
				</div>
				<div class="span">Administrar base de datos</div>
				<div class="botonesdiv">
					<button onclick="nuevo_estudiante()"><img src="../icons/toga.png">Nuevo estudiante</button>
					<button onclick="nuevo_profesor()"><img src="../icons/toga.png">Nuevo profesor</button>
					<button onclick="nueva_materia()"><img src="../icons/toga.png">Nueva materia</button>
					<button onclick="materia_curso()"><img src="../icons/toga.png">Asignar materia a curso</button>
					<button onclick="horario()"><img src="../icons/horario.png">Asignar horario</button>
				</div>
				<div class="botonesdiv">
					<button onclick="nuevo_curso()"><img src="../icons/toga.png">Nuevo curso</button>
					<button onclick="materia_profesor()"><img src="../icons/toga.png">Asignar materia a profesor</button>
					<button onclick="nuevo_padre()"><img src="../icons/toga.png">Nuevo padre/madre de familia</button>
					<button onclick="ver_dbs()"><img src="../icons/dbs.png">Ver todas las bases de datos</button>
				</div>
				<div class="span">Otras funciones</div>
				<div class="botonesdiv">
					<button onclick="nuevo_correo()"><img src="../icons/mail.png">Enviar correo</button>
				</div>
				<div class="span">Configuracion</div>
				<div class="botonesdiv">
					<button onclick="modificar_pagina()"><img src="../icons/lapiz.png">Modificar página</button>
					<button><img src="../icons/setup.png">Opciones de la plataforma</button>
				</div>
				</div>
				<?php
$hex = $fila['color1'];
list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
$opacity = 0.5;
$rgcolor1 = "$r,$g,$b";
?>
			</div>
		</div>
	</div>
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
<script type="text/javascript" src="botones.js"></script>
</body>
</html>