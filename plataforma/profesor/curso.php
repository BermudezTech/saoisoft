<?php
ob_start();
session_start();
?>
<div class="modal7" id="modal7" style="display: none;">
	<div class="contenidomodal7">
		<div class="close">
			<button type="button" onclick="cerrarm()">X</button>
		</div>
		<h2>Calificar</h2><br><br>
		<div class="calificar" id="calificar"></div>
		<style>
			.calificar {
				width: 100%;
				height: 100%;
			}
		</style>
	</div>
	<br><br><br>
</div>

</div>
<div class="modal8" id="modal8" style="">
	<div class="contenidomodal8">
		<div class="close">
			<button type="button" onclick="cerrarm2()">X</button>
		</div>
		<h2>Calificar</h2><br><br>
		<div class="calificarexamen" id="calificarexamen"></div>
		<style>
			.calificar {
				width: 100%;
				height: 100%;
			}
		</style>
	</div>
	<br><br><br>
</div>

</div>
<?php
include 'permisos_profesor.php';
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
	.header {
		background-color:
			<?php echo $fila['color1'] ?>
		;
	}

	.aside {
		background-color:
			<?php echo $fila['color2'] ?>
		;
	}

	.aside hr {
		color:
			<?php echo $fila['color3'] ?>
		;
	}

	.header .separador {
		color:
			<?php echo $fila['color3'] ?>
		;
	}

	.span {
		background-color:
			<?php echo $fila['color3'] ?>
		;
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
					<p><b>Curso:
						</b><?php echo $curso['nombre'] ?>
					</p>
					<p><b>Materia:
						</b><?php echo $materia['nombre'] ?>
					</p>
					<p><b>Salon:
						</b><?php echo $salon['nombre'] ?>
					</p>
					<p><b>Profesor:
						</b><?php echo $profesor['nombres'] . " " . $profesor['apellidos']; ?>
					</p>
				</div><br><br>
				<div class="actividades">
					<table>
						<tr>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Adjunto</th>
							<th>Editar</th>
							<th>Eliminar</th>
							<th>Calificar</th>
						</tr>
						<?php
                   $id = $_REQUEST['id'];
$st = $conexion -> prepare("SELECT * FROM actividades WHERE cursos='$id'");
$st -> execute();
while ($actividades = $st -> fetch()) {
    ?>
						<tr>
							<td><?php echo $actividades['nombre']; ?>
							</td>
							<td><?php echo $actividades['descripcion']; ?>
							</td>
							<td><?php if ($actividades['adjunto'] == null) {
							    ?>
								<?php
							} else {?><a
									href="../<?php echo $actividades['adjunto'] ?>"><img
										src="../icons/carpeta.png"></a><?php } ?>
							</td>
							<td class="buttons"><a
									href="newactivity.php?tipo=4&actividadid=<?php echo $actividades['id'] ?>"><img
										src="../icons/lapiz.png"></a></td>
							<td class="buttons"><a
									href="newactivity.php?tipo=5&actividadid=<?php echo $actividades['id'] ?>"><img
										src="../icons/bin.png"></a></td>
							<td class="buttons"><a href="#"
									onclick="calificar(<?php echo $actividades['id'] ?>, <?php echo $id_curso; ?>)"><img
										src="../icons/info.png"></a></td>
						</tr>
						<style>
							td img {
								height: 30px;
							}

							.buttons {
								text-align: center;
							}
						</style>
						<?php
}

?>
					</table>
					<div class="form">
						<button class="button-submit-green" type="button"
							style="width: 100%; margin-top: 10px; border: none; padding: 5px; box-sizing: border-box; color: #ffffff; font-weight: bold; cursor: pointer;"
							onclick="newactivity()">Nueva actividad</button>
					</div>

				</div>
				<br>
				<div class="span">Multimedia</div><br>
				<div class="actividades">
					<table>
						<tr>
							<th>Nombre</th>
							<th>Abrir multimedia</th>
							<th>Eliminar</th>
						</tr>
						<?php
                    $id = $_REQUEST['id'];
$st = $conexion -> prepare("SELECT * FROM multimedia WHERE curso='$id'");
$st -> execute();
while ($actividades = $st -> fetch()) {
    ?>
						<tr>
							<td><?php echo $actividades['titulo'];
    $url = $actividades['url'];?>
							</td>
							<td><a
									href="abrir_multimedia.php?url=<?php echo $url ?>"><img
										src="../icons/multimedia.png"></a></td>
							<td class="buttons"><a
									href="newactivity.php?tipo=6&actividadid=<?php echo $actividades['id'] ?>"><img
										src="../icons/bin.png"></a></td>
						</tr>
						<style>
							td img {
								height: 30px;
							}

							.buttons {
								text-align: center;
							}
						</style>
						<?php
}

?>
					</table>
					<div class="form">
						<button class="button-submit-green" type="button"
							style="width: 100%; margin-top: 10px; border: none; padding: 5px; box-sizing: border-box; color: #ffffff; font-weight: bold; cursor: pointer;"
							onclick="location.href='newactivity.php?tipo=3&actividadid=1'">Nueva multimedia</button>
					</div>
					<br>
					<div class="span">Examenes</div><br>
					<div class="actividades">
						<table>
							<tr>
								<th>Nombre</th>
								<th>Editar</th>
								<th>Eliminar</th>
								<th>Calificar</th>
							</tr>
							<?php
                    $id = $_REQUEST['id'];
$st = $conexion -> prepare("SELECT * FROM exam WHERE curso='$id'");
$st -> execute();
while ($actividades = $st -> fetch()) {
    $examenid = $actividades['id'];
    ?>
							<tr>
								<td><?php echo $actividades['nombre']; ?>
								</td>
								<td class="buttons"><a
										href="nuevo_examen.php?examen=<?php echo $examenid ?>"><img
											src="../icons/lapiz.png"></a></td>
								<td class="buttons"><a
										href="newactivity.php?tipo=7&actividadid=<?php echo $actividades['id'] ?>"><img
											src="../icons/bin.png"></a></td>
								<?php $id_curso = $_REQUEST['id']; ?>
								<td class="buttons"><button type="button"
										onclick="calificarexamen(<?php echo $actividades['id'] ?>, <?php echo $id_curso; ?>)"
										style="border: none; background-color: transparent; cursor: pointer;"><img
											src="../icons/info.png"></button></td>
							</tr>
							<style>
								td img {
									height: 30px;
								}

								.buttons {
									text-align: center;
								}
							</style>
							<?php
}

?>
						</table>

					</div>
				</div>
			</div>
		</div>
		<style>
			.informacioncurso b {
				color: #034670;
			}

			table {
				width: 100%;
				border: 3px solid
					<?php echo $fila['color1'] ?>
				;
				border-collapse: collapse;
			}

			th,
			td {
				border: 1px solid
					<?php echo $fila['color3'] ?>
				;
				padding: 10px;
				box-sizing: border-box;
			}
		</style>
		<script type="text/javascript" src="botones.js"></script>
		<script>
			function calificar(id, curso) {
				$.ajax({
					url: 'validar/calificar.php',
					type: "POST",
					data: {
						curso: curso,
						id: id
					},
					success: function(response) {
						document.getElementById('calificar').innerHTML = response;
					}
				});
				document.getElementById('modal7').style.display = 'inline-flex';
			}

			function revisarenvio(id, curso, estudiante) {
				$.ajax({
					url: 'validar/revisarenvio.php',
					type: "POST",
					data: {
						id: id,
						curso: curso,
						estudiante: estudiante
					},
					success: function(response) {
						document.getElementById('calificar').innerHTML = response;
					}
				});
			}

			function revisarenvioexamen(id, curso, estudiante) {
				$.ajax({
					url: 'validar/revisarenvioexamen.php',
					type: "POST",
					data: {
						id: id,
						curso: curso,
						estudiante: estudiante
					},
					success: function(response) {
						document.getElementById('calificarexamen').innerHTML = response;
					}
				});
			}

			function cerrarm() {
				document.getElementById('modal7').style.display = 'none';
			}

			function cerrarm2() {
				document.getElementById('modal8').style.display = 'none';
			}

			function calificarexamen(examen, idcurso) {
				$.ajax({
					url: 'validar/calificar_examen.php',
					type: "POST",
					data: {
						idcurso: idcurso,
						examen: examen
					},
					success: function(response) {
						document.getElementById('calificarexamen').innerHTML = response;
					}
				});
				document.getElementById('modal8').style.display = 'inline-flex';
			}

			function calificarpregunta(estado, pregunta, estudiante, id, curso, intento) {
				$.ajax({
					url: 'validar/revisarenvioexamen.php',
					type: "POST",
					data: {
						curso: curso,
						id: id,
						estado: estado,
						pregunta: pregunta,
						intento: intento,
						estudiante: estudiante
					},
					success: function(response) {
						document.getElementById('calificarexamen').innerHTML = response;
					}
				});
			}
		</script>
</body>

</html>