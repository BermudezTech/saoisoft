<?php 

include '../../conexion.php';

$nombre = $_POST['nombre'];

$st = $conexion -> prepare("INSERT INTO materias (nombre) VALUES ('$nombre')");
$st -> execute();
header('Location: ../');

 ?>