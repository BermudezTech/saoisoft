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
				<div class="span">Mis clases</div><br><br>
				<table>
					<tr>
						<th>Clase</th>
						<th>Materia</th>
						<th>Profesor</th>
					</tr>
					<?php 
						$id = $_SESSION['id'];
						$sql1 = "SELECT * FROM relestudiantesalon WHERE estudiante='$id'";
						$sq = $conexion -> prepare($sql1);
						$sq -> execute();
						$salon = $sq -> fetch();
						$salon = $salon['salon'];
						$sq2 = $conexion -> prepare("SELECT * FROM cursos WHERE salon='$salon'");
						$sq2 -> execute();
						while($curso = $sq2 -> fetch()){
						$cursoid = $curso['id'];
						$materia = $curso['materia'];
						$sq3 = $conexion -> prepare("SELECT * FROM materias WHERE id = '$materia'");
						$sq3 -> execute();
						$materia = $sq3 -> fetch();
						$sq4 = $conexion -> prepare("SELECT * FROM relprofesorcursos WHERE cursos = '$cursoid'");
						$sq4 -> execute();
						$profesor = $sq4 -> fetch();
						$profesor = $profesor['profesor'];
						$sq5 = $conexion -> prepare("SELECT * FROM usuario WHERE id='$profesor'");
						$sq5 -> execute();
						$profesor = $sq5 -> fetch();
						$profesor = $profesor['apellidos'] . " " . $profesor['nombres'];
					?>
					<tr class="fila" onclick="curso(<?php echo $curso['id']; ?>)">
						<td><?php echo $curso['nombre'] ?></td>
						<td><?php echo $materia['nombre'] ?></td>
						<td><?php echo $profesor ?></td>
					</tr>
					<?php
						}						
					 ?>
				</table>
			</div>
		</div>
	</div>
<style>
	table{
		border: 3px solid <?php echo $fila['color1'] ?>;
		width: 100%;
		border-collapse: collapse;
		-webkit-box-shadow: 7px 7px 5px 0px rgba(0,0,0,0.23);
		-moz-box-shadow: 7px 7px 5px 0px rgba(0,0,0,0.23);
		box-shadow: 7px 7px 5px 0px rgba(0,0,0,0.23);
	}
	td,th{
		border: 1px solid <?php echo $fila['color3'] ?>;
		padding: 10px;
		box-sizing: border-box;
	}
	.fila:hover{
		background-color: rgba(0,0,0,0.2);
		cursor: pointer;
	}
</style>
<script type="text/javascript" src="botones.js"></script>
<script>
	function curso(curso){
		location.href = "curso.php?id="+curso;
	}
</script>
</body>
</html>