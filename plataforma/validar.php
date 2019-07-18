<?php 

sleep(2);
include 'conexion.php';

$usuario = $_POST['username'];
$pass = $_POST['password'];
$estado = 0;
$busqueda=$conexion->prepare("SELECT * FROM usuario");
$busqueda->execute();
while ($muestra = $busqueda->fetch()) {
	if ($usuario == $muestra['id']) {
		$estado=1;
		if ($pass == $muestra['pass']) {
			$estado = $estado + 1;
			$id = $muestra['id'];
		}
		break;
	}else{
		$usuarioEncontrado =0;
	}
}
switch ($estado) {
	case 0:
		echo json_encode('error');
	break;
	case 1:
		echo json_encode('incorrecto');
	break;
	case 2:
		echo json_encode('correcto');
		session_start();
		$st = $conexion -> prepare("SELECT * FROM usuario WHERE id='$id'");
		$st ->execute();
		$usuario = $st -> fetch();
		$_SESSION['id'] = $usuario['id'];
		$_SESSION['nombres'] = $usuario['nombres'];
		$_SESSION['apellidos'] = $usuario['apellidos'];
		$_SESSION['foto'] = $usuario['foto'];
		$_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
	break;
}


 ?>