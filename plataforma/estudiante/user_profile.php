<?php 
session_start();
include 'permisos_estudiante.php';
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
<style type="text/css">
	.usuarioinfo{
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: space-between;
	}
	.usuarioinfo h4{
		color: #17346A;
	}
	.infoplus{
		margin-left: 30px;
	}
	.leftinfo{
		display: flex;
	}
	.hora-fecha{
		color: #B3B3B3;
		width: 20%;
		font-size: 14px;
	}
	.banner{
		background-image: url(https://www.dzoom.org.es/wp-content/uploads/2017/07/seebensee-2384369-810x540.jpg);
	}
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
	.publicacion{
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.publicacion hr{
		margin-top: 20px;
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
					<?php 
					$id = $_REQUEST['id'];
					$sq = $conexion -> prepare("SELECT * FROM usuario WHERE id = '$id'");
					$sq -> execute();
					$usuario = $sq -> fetch();
					 ?>
					<h2><?php echo $usuario['nombres']." ".$usuario['apellidos'] ?></h2>
					<img src="../<?php echo $usuario['foto'] ?>">
				</div>
				<div class="botonesperfil">
					<button onclick="publicaciones()">Publicaciones foro</button>
					<button onclick="infodata()">Informacion personal</button>
				</div><br><br>
				<div class="publicaciones" id="publicaciones">
				<?php 
$id = $_REQUEST['id'];
$sq = $conexion -> prepare("SELECT * FROM publicaciones WHERE usuario ='$id' ORDER BY id DESC");
$sq -> execute();
$contador = 0;
while ($publicacion = $sq -> fetch()) {
	$contador = 1;
	$idpublicador = $publicacion['usuario'];
	$materia = $publicacion['materia'];
	$sq2 = $conexion -> prepare("SELECT * FROM usuario WHERE id = '$idpublicador'");
	$sq2 -> execute();
	$usuario = $sq2 -> fetch();
	$sq3 = $conexion -> prepare("SELECT * FROM cursos WHERE id= '$materia'");
	$sq3 -> execute();
	$materia = $sq3 -> fetch();
?>
<div class="publicacion">
<div class="usuarioinfo">
	<div class="leftinfo">
		<img src="../<?php echo $usuario['foto'] ?>" width="5%">
		<div class="infoplus">
			<h4><?php echo $usuario['nombres']." ".$usuario['apellidos'] ?></h4>
			<h4><?php echo $materia['nombre'] ?></h4>
		</div>		
	</div>
	<div class="hora-fecha">
		<?php echo $publicacion['date'] ?>
	</div>
</div>
<br>
<?php echo $publicacion['publicacion'] ?>
<hr style="border: 1px solid <?php echo $fila['color3'] ?>">
</div>
<?php
}

 ?>
 <?php if ($contador == 0) {
 ?>
 <h2 style="text-align: center;">Aun no hay publicaciones</h2>
 <?php 
 } ?>
</div>
 <div class="infodata" id="infodata">
					<?php $id = $_REQUEST['id'];
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