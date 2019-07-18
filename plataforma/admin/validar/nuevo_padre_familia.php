<?php 

include '../../conexion.php';
$estudiante = $_POST['estudiante'];
$id = $_POST['id'];

if ($id != '') {
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$lnacimiento = $_POST['lnacimiento'];
$fnacimiento = $_POST['fnacimiento'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$tipo_documento = $_POST['tipo_documento'];
$cargarFoto = $_FILES['foto']['tmp_name'];

$folder = "../../usuarios/fotos";
$carpeta_destino =$folder;
move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino."/".$id.".jpg");
$foto_user = "usuarios/fotos/".$id.".jpg";
//Padre
$query = "INSERT INTO usuario (id,nombres,apellidos,email,tipo_usuario,pass,lugar_nacimiento,fecha_nacimiento, direccion, telefono, foto, tipo_documento) VALUES ($id,'$nombres','$apellidos', '$email', 3, '$pass', '$lnacimiento', '$fnacimiento', '$direccion', '$telefono', '$foto_user', '$tipo_documento')";
echo $query;
$st = $conexion -> prepare($query);
$st->execute();	
}
//Madre
$idM = $_POST['idM'];
if ($idM != '') {
$nombres = $_POST['nombresM'];
$apellidos = $_POST['apellidosM'];
$email = $_POST['emailM'];
$pass = $_POST['passM'];
$lnacimiento = $_POST['lnacimientoM'];
$fnacimiento = $_POST['fnacimientoM'];
$direccion = $_POST['direccionM'];
$telefono = $_POST['telefonoM'];
$tipo_documento = $_POST['tipo_documentoM'];
$cargarFoto = $_FILES['fotoM']['tmp_name'];

$folder = "../../usuarios/fotos";
$carpeta_destino =$folder;
move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino."/".$id.".jpg");
$foto_user = "usuarios/fotos/".$id.".jpg";
$query = "INSERT INTO usuario (id,nombres,apellidos,email,tipo_usuario,pass,lugar_nacimiento,fecha_nacimiento, direccion, telefono, foto, tipo_documento) VALUES ($idM,'$nombres','$apellidos', '$email', 3, '$pass', '$lnacimiento', '$fnacimiento', '$direccion', '$telefono', '$foto_user', '$tipo_documento')";
echo $query;
$st = $conexion -> prepare($query);
$st->execute();	
}

if ($id == '') {
	$query2 = "INSERT INTO relestudiantepadre(estudiante, madre) VALUES ('$estudiante', '$idM')";
	$st2 = $conexion -> prepare($query2);
	$st2 -> execute();
}else if($idM == ''){
	$query2 = "INSERT INTO relestudiantepadre(estudiante, padre) VALUES ('$estudiante', '$id')";
	$st2 = $conexion -> prepare($query2);
	$st2 -> execute();
}else{
	$query2 = "INSERT INTO relestudiantepadre(estudiante, padre, madre) VALUES ('$estudiante', '$id', '$idM')";
	$st2 = $conexion -> prepare($query2);
	$st2 -> execute();	
}
echo "<br>";
echo $query2;

header('Location: ../');

 ?>