<?php 

$id = $_REQUEST['usuario'];
$pass = $_REQUEST['pass'];

include 'conexion.php';
$st = $conexion -> prepare("SELECT * FROM usuario WHERE id='$id'");
$st -> execute();
$resultado = $st -> fetch();
if ($resultado['pass'] == $pass) {
?>
<?php 

include 'conexion.php';

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
 	<link rel="stylesheet" href="styles/botones.css">
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
 				<form action="updatepass.php?id=<?php echo $id ?>" method="POST">
 				<label>Escriba su nueva contraseña:</label>
 				<input type="password" name="pass1" id="pass1" onkeyup="myFunction()">
 				<label>Escriba su nueva contraseña de nuevo:</label>
 				<input type="password" name="pass2" id="pass2" onkeyup="myFunction()">
 				<div id="span2"></div>
 				<input type="submit" value="Recuperar mi contraseña" class="button-submit-green">
 				</form>
 			</div>
 		</div>
 		<div class="footer">
 			
 		</div>
 	</div>
 	</form>
 <style>
 	.form img{
 		width: 15px;
 	}
 </style>
 <script>
	var span = document.getElementById('span2');
	var pass = document.getElementById('pass1');
	var pass_2 = document.getElementById('pass2');
	function myFunction(){
		if (pass.value == pass_2.value) {
			span.style.color = 'green';
			span.innerHTML = 'Correcto';
		}else{
			span.style.color = 'red';
			span.innerHTML = '<img src="http://www.gifde.com/gif/otros/decoracion/cargando-loading/cargando-loading-041.gif" class="gif">No coinciden las contraseñas';
		}
	}	
</script>
 </body>
 </html>
<?php
}

 ?>