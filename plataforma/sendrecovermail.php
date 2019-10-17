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
$mail = $_POST['mail'];
$asunto = "Recuperar su contraseña";
$sq = $conexion -> prepare("SELECT * FROM usuario WHERE email ='$mail'");
$sq -> execute();
$resultado = $sq -> fetch();
$pass = $resultado['pass'];
$id = $resultado['id'];
$text = "Usuario $id. Para recuperar su contraseña, por favor de click en el boton o <a href='http://192.168.1.149/saoi-soft/plataforma/plataforma/recovernew.php?pass=$pass&usuario=$id'>aqui</a><br><br><a href="."'http://192.168.1.149/plataforma/plataforma/recovernew.php?pass=$pass&usuario=$id'"." style='border:none; width: 200px; height: 30px; padding: 5px; box_sizing: border_box; background-color: #0E74C3; color: #ffffff; font-weight: bold; cursor: pointer; margin-top: 10px; text-decoration: none;'>Recuperar mi contraseña</a>";
$email = "jebermudez587@gmail.com";
$headers = 'From: ' .$email . "\r\n".
  'MIME-Version: 1.0' . "\r\n" .
  'Content-type: text/html; charset=utf-8' . "\r\n" .
  'Reply-To: ' . $email. "\r\n" . 
  'X-Mailer: PHP/' . phpversion();
$success = mail($mail, $asunto, $text,$headers);
if (!$success) {
    $errorMessage = error_get_last()['message'];
}

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
 	
 	<form action="" id="formulario">
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
 				<img src="icons/mail.png" style="width: 20%;">
 				<label>Por favor verifique su correo.</label>
 			</div>
 		</div>
 		<div class="footer">
 			
 		</div>
 	</div>
 	</form>
 </body>
 </html>