 <?php 

include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();
session_start();
//include 'permisos_admin.php';

 ?>
 <?php 
$id_curso = $_REQUEST['id'];
$sq = $conexion -> prepare("SELECT * FROM cursos WHERE id='$id_curso'");
$sq -> execute();
$curso = $sq -> fetch();
$materia = $curso['materia'];
$sq2 = $conexion -> prepare("SELECT * FROM materias WHERE id='$materia'");
$sq2 -> execute();
$materia = $sq2 -> fetch();
$salon = $curso['salon'];
$sq2 = $conexion -> prepare("SELECT * FROM salon WHERE id='$salon'");
$sq2 -> execute();
$salon = $sq2 -> fetch();
$sq2 = $conexion -> prepare("SELECT * FROM relprofesorcursos WHERE cursos='$id_curso'");
$sq2 -> execute();
$relprofesorcursos = $sq2 -> fetch();
$profesor = $relprofesorcursos['profesor'];
$sq2 = $conexion -> prepare("SELECT * FROM usuario WHERE id='$profesor'");
$sq2 -> execute();
$profesor = $sq2 -> fetch();
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
				<div class="informacioncurso">
					<p><b>Curso: </b><?php echo $curso['nombre'] ?></p>
					<p><b>Materia: </b><?php echo $materia['nombre'] ?></p>
					<p><b>Salon: </b><?php echo $salon['nombre'] ?></p>
					<p><b>Profesor: </b><?php echo $profesor['nombres']." ".$profesor['apellidos']; ?></p>
				</div><br><br>
				<div class="actividades">
					<table>
					<tr>
						<th>Id</th>
						<th>Calificacion</th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Resolver</th>
					</tr>
					<tr>
						<td>1</td>
						<td>8</td>
						<td>Hacer la actividad de la pagina</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque assumenda consequatur consequuntur fugit, dicta id, ab, molestias facilis obcaecati, officia quod vero. Porro eaque, consequatur, delectus adipisci ipsam blanditiis tenetur.</td>
						<td>Resolver</td>
					</tr>
					<tr>
						<td>1</td>
						<td>8</td>
						<td>Hacer la actividad de la pagina</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque assumenda consequatur consequuntur fugit, dicta id, ab, molestias facilis obcaecati, officia quod vero. Porro eaque, consequatur, delectus adipisci ipsam blanditiis tenetur.</td>
						<td>Resolver</td>
					</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
<style>
	.informacioncurso b{
		color: #034670;
	}
	table{
		width: 100%;
		border: 3px solid <?php echo $fila['color1'] ?>;
		border-collapse: collapse;
	}
	th,td{
		border: 1px solid <?php echo $fila['color3'] ?>;
		padding: 10px;
		box-sizing: border-box;
	}
</style>
<script type="text/javascript" src="botones.js"></script>
</body>
</html>