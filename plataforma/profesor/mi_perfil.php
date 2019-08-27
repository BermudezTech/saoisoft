<?php 
session_start();
include 'permisos_profesor.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mi perfil</title>
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
	.info{
		background-color: <?php echo $fila['color1'] ?>;
	}
	.banner{
		background-image: url(https://www.dzoom.org.es/wp-content/uploads/2017/07/seebensee-2384369-810x540.jpg);
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
				<div class="banner">
					<h2><?php echo $_SESSION['nombres']." ".$_SESSION['apellidos'] ?></h2>
					<img src="../<?php echo $_SESSION['foto'] ?>">
				</div>
				<div class="botonesperfil">
					<button onclick="publicaciones()">Mis publicaciones foro</button>
					<button onclick="infodata()">Informacion personal</button>
				</div><br><br>
				<div class="publicaciones" id="publicaciones"><?php include 'publicaciones.php'; ?></div>
				<div class="infodata" id="infodata">
					<?php $id = $_SESSION['id'];
					$sq = $conexion -> prepare("SELECT * FROM usuario WHERE id = '$id'");
					$sq -> execute();
					while ($usuario = $sq -> fetch()) {?>
					<table>
						<tr>
							<td class="subtitle">Nombres:</td>
							<td><?php echo $usuario['nombres']; ?></td>
						</tr>
						<tr>
							<td class="subtitle">Apellidos:</td>
							<td><?php echo $usuario['apellidos']; ?></td>
						</tr>
						<tr>
							<td class="subtitle">Correo:</td>
							<td><?php echo $usuario['email']; ?></td>
						</tr>
					</table>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<style type="text/css">
	.subtitle{
		color: #013166;
		font-weight: bold;
		line-height: 2;
		margin-right: 20px;
	}
	.infodata{
		font-size: 16px;
		display: none;
	}
	.infodata table{
		width: 100%;
	}
</style>
<script type="text/javascript" src="botones.js"></script>
<script type="text/javascript">
	function infodata(){
		document.getElementById('infodata').style.display = "block";
		document.getElementById('publicaciones').style.display = "none";
	}
	function publicaciones(){
		document.getElementById('infodata').style.display = "none";
		document.getElementById('publicaciones').style.display = "block";	
	}
</script>
</body>
</html>