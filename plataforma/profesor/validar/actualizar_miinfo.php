<?php 

include '../../conexion.php';
session_start();
$id = $_SESSION['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$lnacimiento = $_POST['ln'];
$fnacimiento = $_POST['fn'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$query = "UPDATE usuario SET nombres = '$nombres', apellidos = '$apellidos', email = '$email', pass = '$pass', lugar_nacimiento = '$lnacimiento', fecha_nacimiento = '$fnacimiento', direccion = '$direccion', telefono = '$telefono' WHERE id = '$id'";
echo $query;
$st = $conexion -> prepare($query);
$st->execute();
header('Location: ../');

 ?>