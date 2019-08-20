<?php 

include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();
session_start();
//include 'permisos_admin.php';
$idcurso = $_REQUEST['id'];

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
				<?php 
					$st = $conexion -> prepare("SELECT * FROM cursos WHERE id='$idcurso'");
					$st -> execute();
					$publicacion = $st -> fetch();
					$nombrepublicacion = $publicacion['nombre'];
				 ?>
				<h2>Publicaciones <?php echo $nombrepublicacion ?></h2>
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
</style>
<?php 
$id = $_SESSION['id'];
$sq = $conexion -> prepare("SELECT * FROM publicaciones ORDER BY id DESC");
$sq -> execute();
while ($publicacion = $sq -> fetch()) {
	$idpublicador = $publicacion['usuario'];
	$materia = $publicacion['materia'];
	$sq2 = $conexion -> prepare("SELECT * FROM usuario WHERE id = '$idpublicador'");
	$sq2 -> execute();
	$usuario = $sq2 -> fetch();
	$sq3 = $conexion -> prepare("SELECT * FROM cursos WHERE id= '$materia'");
	$sq3 -> execute();
	$materia = $sq3 -> fetch();
?>
<hr style="border: 1px solid <?php echo $fila['color3'] ?>; margin-top: 25px; margin-bottom: 25px;">
<div class="usuarioinfo">
	<div class="leftinfo">
		<img src="../<?php echo $usuario['foto'] ?>" width="5%">
		<div class="infoplus">
			<h4><a href="user_profile.php?id=<?php echo $usuario['id'] ?>"><?php echo $usuario['nombres']." ".$usuario['apellidos'] ?></a></h4>
			<h4><?php echo $materia['nombre'] ?></h4>
		</div>		
	</div>
	<div class="hora-fecha">
		<?php echo $publicacion['date'] ?>
	</div>
</div>
<br>
<?php echo $publicacion['publicacion'] ?>
<!--<?php //color
/*$iduser = $_SESSION['id'];
$color = $conexion -> prepare("SELECT * FROM rellikesdislikes");
$color -> execute();
while ($colorlike= $color -> fetch()) {
	if ($colorlike['likes'] == $iduser && $colorlike['publicacion'] == $publicacion['id']) {
		$colors = $fila['color3'];
	}else{
		$colors = "#ffffff";
	}
}

 ?>
 <button class="like icon" id="like like<?php echo $publicacion['id'] ?>" onclick="likes(<?php echo $publicacion['id']; ?>)" type="button" style="background-color: <?php echo $colors; ?>"><img src="../icons/pulgarup.png"> <l id="likenumber"><?php echo $publicacion['likes'] ?></l></button>
 <button class="like icon" id="dislike" onclick="dislikes()"><img src="../icons/pulgardown.png"> <?php echo $publicacion['dislikes']*/ ?></button>
 -->
<?php
}

 ?>
			</div>
		</div>
	</div>
<script type="text/javascript" src="botones.js"></script>
</body>
</html>