<?php 

include '../../conexion.php';

$nombre = $_POST['nombre'];
$grado = $_POST['grado'];

$st = $conexion -> prepare("INSERT INTO salon(nombre,grado) VALUES ('$nombre','$grado')");
$st->execute();
header('Location: ../');

 ?>