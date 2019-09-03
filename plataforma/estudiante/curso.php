 <div class="modal7" id="modal7" style="display: none;">
					<div class="contenidomodal7">
						<div class="close">
							<button type="button" onclick="cerrarm()">X</button>
						</div>
						<h2>Responder actividad</h2><br><br>
						<div class="calificar" id="calificar"></div>
						<style>
							.calificar{
								width: 100%;
								height: 100%;
							}
						</style>
					</div>
						<br><br><br>
					</div>
							
				</div>
 <?php 
session_start();
include 'permisos_estudiante.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();

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
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Adjunto</th>
						<th>Calificacion</th>
						<th>Responder</th>
					</tr>
					<?php 
					$id = $_REQUEST['id'];
					$st = $conexion -> prepare("SELECT * FROM actividades WHERE cursos='$id'");
					$st -> execute();
					while ($actividades = $st -> fetch()) {
					?>
					<tr>
						<td><?php echo $actividades['nombre']; ?></td>
						<td><?php echo $actividades['descripcion']; ?></td>
						<td><?php if ($actividades['adjunto'] == NULL) {
						?>
						<?php
						}else{?><a href="../<?php echo $actividades['adjunto'] ?>"><img src="../icons/carpeta.png"></a><?php } ?></td>
						<td><?php 
						$estudiante = $_SESSION['id'];
						$actividad = $actividades['id'];
						$st3 = $conexion -> prepare("SELECT * FROM calificaciones WHERE estudiante = '$estudiante' AND actividad = '$actividad'");
						$st3 -> execute();
						$nota = $st3 -> fetch();
						echo $nota['nota'];
						  ?></td>
						<td class="buttons"><?php $tipo = $actividades['tipo'];
						if ($tipo == 1) {
						?>
						<a href="#" onclick="calificar(<?php echo $actividades['id'] ?>, <?php echo $id_curso; ?>)"><img src="../icons/exclamacion.png"></a><?php	} ?></td>
					</tr>
					<style>
						td img{
							height: 30px;
						}
						.buttons{
							text-align: center;
						}
					</style>
					<?php
					}

					 ?>
					</table>
				</div>
				<br><br><div class="span">Material multimedia</div><br><br>
				<div class="actividades">
					<table>
					<tr>
						<th>Nombre</th>
						<th>Abrir multimedia</th>
					</tr>
					<?php 
					$id = $_REQUEST['id'];
					$st = $conexion -> prepare("SELECT * FROM multimedia WHERE curso='$id'");
					$st -> execute();
					while ($actividades = $st -> fetch()) {
					?>
					<tr>
						<td><?php echo $actividades['titulo']; $url = $actividades['url'];?></td>
						<td><a href="abrir_multimedia.php?url=<?php echo $url ?>"><img src="../icons/multimedia.png"></a></td>
					</tr>
					<?php
					}

					 ?>
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
<script>
	function calificar(id, curso){
		$.ajax({
		url: 'validar/responder.php',
		type: "POST",
		data: { curso: curso, id:id},
		success: function(response){
			document.getElementById('calificar').innerHTML = response;
		}
	});
		document.getElementById('modal7').style.display = 'inline-flex';
	}
	function cerrarm(){
		document.getElementById('modal7').style.display = 'none';	
	}
</script>
</body>
</html>