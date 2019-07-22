<?php 
include '../../conexion.php';
$id = $_REQUEST['id'];
$pass = $_POST['pass1'];
$pass = password_hash($pass, PASSWORD_DEFAULT);
$st = $conexion -> prepare("UPDATE usuario SET pass = '$pass' WHERE id='$id'");
$st -> execute();
 ?>
<?php 

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
 	<link rel="stylesheet" href="../../styles/main.css">
 	<link rel="stylesheet" href="../../styles/botones.css">
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
 	
 	<div class="contenedor">
 		<div class="span" id="span">Usuario o contraseña incorrectos</div>
 		<div class="header" >
 			<div class="logo">
 				<img src="data:image/jpg;base64,<?php echo base64_encode($fila['escudo']); ?>">
 				<div class="nombre"><?php echo $fila['nombre']; ?></div>
 			</div>
 		</div>
 		<div class="main">
 			<div class="form">
 				<form action="../index.php">
 				<label>Su contraseña ha sido cambiada correctamente</label>
 				<input type="submit" value="Regresar" class="button-submit-green">
 				</form>
 			</div>
 		</div>
 		<div class="footer">
 			
 		</div>
 	</div>
 	</form>
 </body>
 </html>
