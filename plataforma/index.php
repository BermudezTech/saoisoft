<?php 

include 'conexion.php';
session_start();
if (isset($_SESSION['tipo_usuario'])) {
	header('location: select_user.php');
}else{
	session_destroy();
}
if(isset($conexion)){
	//echo "No hay problemas";
}else{
	header('Location: setup/');
}
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();

 ?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<title>Inicio</title>
 	<link rel="stylesheet" href="styles/main.css">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<link rel="image/x-icon" href="Finallogo.png">
 </head>
 <style>
 	 .header{
	 	background-color: <?php echo $fila['color1'] ?>;
	 }
	 .span{
	 	background-color: <?php echo $fila['color3']?>
	 }
	 .forget{
	 	background-color: <?php echo $fila['color1'] ?>;	
	 }
 </style>
 <body>
 	
 	<form action="" id="formulario">
 	<div class="contenedor">
 		<div class="span" id="span">Usuario o contraseña incorrectos</div>
 		<div class="header" >
 			<div class="logo">
 				<img src="data:image/jpg;base64,<?php echo base64_encode($fila['escudo']); ?>">
 				<div class="nombre"><?php echo $fila['nombre']; ?></div>
 			</div>
 			<div class="login">
 					<div class="username">Usuario:<input type="text" name="username"></div>
 					<div class="password">Contraseña:<input type="password" name="password" required="true"></div>
 					<div class="submitdiv"> <input type="submit" value="Ingresar" id="boton"></div>
 			</div>
 		</div>
 		<div class="forget"><a href="recover_pass.php">Olvide mi contraseña</a></div>
 		<div class="main">
 			<?php echo $fila['main']; ?>
 		</div>
 		<div class="footer">
 			
 		</div>
 	</div>
 	</form>
 	<script src="validar.js"></script>
 </body>
 </html>