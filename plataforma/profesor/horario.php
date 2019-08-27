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
				<table style="width: 100%; border: 3px solid <?php echo $fila['color3'] ?>;">
					<tr>
						<th>Hora</th>
						<th>Lunes</th>
						<th>Martes</th>
						<th>Miercoles</th>
						<th>Jueves</th>
						<th>Viernes</th>
					</tr>
					<?php 
					$iduser = $_SESSION['id'];
					$sq = $conexion -> prepare("SELECT * FROM relprofesorcursos WHERE profesor = '$iduser'");
					$sq -> execute();
					$o = 1;
					while ($cursos = $sq -> fetch()) {
						$curso[$o] = $cursos['cursos'];
						$o++;
					}
					$cursoid = $curso[1];
					$sq2 = $conexion -> prepare("SELECT * FROM cursos WHERE id ='$cursoid'");
					$sq2 -> execute();
					$salon = $sq2 -> fetch();
					$materia = $salon['materia'];
					$salon = $salon['salon'];
					?>
					<tr>
						<td></td>
						<td><?php echo $lunes ?></td>
						<td><?php echo $martes ?></td>
						<td><?php echo $miercoles ?></td>
						<td><?php echo $jueves ?></td>
						<td><?php echo $viernes ?></td>
					</tr>
				</table>
				<style type="text/css">
					table{
						border-collapse: collapse;
					}
					td,th{
						border: 1px solid <?php echo $fila['color3']; ?>;
						padding: 5px;
						box-sizing: border-box;
						text-align: center;
					}
				</style>
			</div>
		</div>
	</div>
<script type="text/javascript" src="botones.js"></script>
</body>
</html>