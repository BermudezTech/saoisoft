<?php 
session_start();
include 'permisos_admin.php';
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
				<div class="modal6" id="modal6">
					<div class="contenidomodal6">
						<div class="close6">
							<button type="button" onclick="cerrar6()">X</button>
						</div>
						<div class="form6">
							<h2>Seleccione el usuario / grupo</h2>
							<h4>Si el dato no aparece, pruebe a recargar</h4><br>
							<button type="button" class="recargar6" onclick="recargar6()">🔄  Recargar datos</button><br><br>
							<form>
								<div class="span">Lista de usuarios / grupos</div>
								<br><div class="busqueda">
									<form>
										<input type="text" placeholder="Buscar" onkeyup="busqueda6()" name="query6" id="query6">
										<input type="submit" value="🔎" style="padding: 0; width: 30px;height: 30px;border: 1px solid #B8B8B8;">
									</form>
								</div>
								<form id="demoForm6"><br><br>
								<div id="datos6"></div><br>
							<button type="button" class="button-submit-green" onclick="modalvalidar6()">Seleccionar usuario / grupo</button>
							</form>
						</div>
						<br><br><br>
					</form>
					</div>
							
				</div>

				<div class="form">
				<form action="validar/send_mail.php" method="POST">
				<div class="span">Enviar correo: </div><br>
				<label>Seleccione usuario o grupo de usuarios al que enviar el correo:</label>
				<button onclick="seleccionar_usuario()" type="button" class="boton2">Seleccionar usuario / Grupo</button><input type="text" name="usuariog" id="usuariog"><br>
				<label>Asunto:</label>
				<input type="text" name="subject">
				<label>Cuerpo del mensaje:</label>
				<?php include 'textarea.php' ?>
				<br><input type="submit" value="Enviar correo" class="button-submit-green">
				</div>
				</form>
			</div>
		</div>
	</div>
<script type="text/javascript" src="botones.js"></script>
</body>
</html>