<?php 
include '../../conexion.php';
$usuariog = $_POST['usuariog'];
$asunto = $_POST['subject'];
$text = $_POST['text'];
$email = "jebermudez587@gmail.com";
$headers = 'From: ' .$email . "\r\n".
  'MIME-Version: 1.0' . "\r\n" .
  'Content-type: text/html; charset=utf-8' . "\r\n" .
  'Reply-To: ' . $email. "\r\n" . 
  'X-Mailer: PHP/' . phpversion();
$sq = $conexion -> prepare("SELECT * FROM usuario WHERE id = '$usuariog'");
$sq -> execute();
$usuario = $sq -> fetch();
if ($usuario['id'] == $usuariog) {
	$correo = $usuario['email'];
}
$sq = $conexion -> prepare("SELECT * FROM salon WHERE id = '$usuariog'");
$sq -> execute();
$salon = $sq -> fetch();
if ($salon['id'] == $usuariog) {
	$sq2 = $conexion -> prepare("SELECT * FROM relestudiantesalon WHERE salon = '$usuariog'");
	$sq2 -> execute();
	$contador = 0;
	while ($rel = $sq2 -> fetch()) {
		$estudiante = $rel['estudiante'];
		$sq3 = $conexion -> prepare("SELECT * FROM usuario WHERE id = '$estudiante'");
		$sq3 -> execute();
		$estudiantearray = $sq3 -> fetch();
		if ($contador == 0) {
			$correo = $estudiantearray['email'];
			$contador = 1;
		}else{
			$correo .= ", ".$estudiantearray['email'];
		}
	}
}
echo $correo;
$mail = $correo;
$success = mail($mail, $asunto, $text,$headers);
if (!$success) {
    $errorMessage = error_get_last()['message'];
}

 ?>