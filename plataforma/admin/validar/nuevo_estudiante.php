<?php


include '../../conexion.php';

$id = $_POST['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass = password_hash($pass, PASSWORD_DEFAULT);
$lnacimiento = $_POST['lnacimiento'];
$fnacimiento = $_POST['fnacimiento'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$tipo_documento = $_POST['tipo_documento'];
$cargarFoto = $_FILES['foto']['tmp_name'];
$curso = $_POST['curso'];
if ($_FILES['foto']['tmp_name'] != "") {
    # code...


    $folder = "../../usuarios/fotos";
    $carpeta_destino = $folder;
    move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino . "/" . $id . ".jpg");
    $foto_user = "usuarios/fotos/" . $id . ".jpg";
} else {
    $foto_user = "setup/default.jpg";
}

$query = "INSERT INTO usuario (id,nombres,apellidos,email,tipo_usuario,pass,lugar_nacimiento,fecha_nacimiento, direccion, telefono, foto, tipo_documento) VALUES ($id,'$nombres','$apellidos', '$email', 1, '$pass', '$lnacimiento', '$fnacimiento', '$direccion', '$telefono', '$foto_user', '$tipo_documento')";
echo $query;
$st = $conexion -> prepare($query);
$st->execute();
$st2 = $conexion -> prepare("INSERT INTO relestudiantesalon (estudiante, salon) VALUES ('$id', '$curso')");
$st2 -> execute();
// header('Location: ../');
// Change location via meta
echo '<meta http-equiv="refresh" content="0; url=../">';
