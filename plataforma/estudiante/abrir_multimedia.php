<?php 
session_start();
include 'permisos_estudiante.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();


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
$url = $_REQUEST['url'];
$urlp = explode("/", $url);
if ($urlp[0]=="usuarios") {
$urlextension = explode(".", $url);
$urlextension = $urlextension[1];
	if ($urlextension == 'png' || $urlextension == 'jpg' || $urlextension == 'gif') {
	?>
	<img src="../<?php echo $url ?>" style="width: 100%;">
	<?php
	}else if ($urlextension == 'mp4') {
	?>
	<video src="../<?php echo $url ?>" style="width: 100%;" controls autoplay></video>
	<?php
	}
}else if($urlp[0]=="https:"||$urlp[0]=="https:"){
	$urlweb = explode(".", $urlp[2]);
	if ($urlweb[1] == "com") {
		$urlweb = $urlweb[0];
	}else{
		$urlweb = $urlweb[1];
	}
	if ($urlweb == 'youtube') {
		$embedurl = $urlp[3];
		$embedurl = explode("=", $embedurl);
		$embedurl = $embedurl[1];
		?>
		<iframe src="https://www.youtube.com/embed/<?php echo $embedurl ?>" frameborder="0" style="width: 100%; height: 100%;"></iframe>
<?php
	}else if($urlweb=="facebook" && $urlp[3] != "watch"){
		//https://www.facebook.com/watch/?v=488440268623691
		//https://www.facebook.com/IniciarSesion/videos/488440268623691/?v=488440268623691
?>
<iframe src="https://www.facebook.com/plugins/video.php?href=<?php echo $embedurl ?>&show_text=0&width=560" style="border:none;overflow:hidden; width: 100%; height: 100%;" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
<?php
	}else{
?>
<iframe src="<?php echo $url ?>" style=" width: 100%; height: 100%;" frameborder="0"></iframe>
<?php	
	}
}


//header('Location: ../curso.php?id=2');
 ?>




			</div>
		</div>
	</div>
<script type="text/javascript" src="botones.js"></script>
</body>
</html>
