<?php 

include '../../conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$grado = $_POST['grado'];

$st = $conexion -> prepare("INSERT INTO salon(id,nombre,grado) VALUES ($id,'$nombre','$grado')");
$st->execute();
header('Location: ../');

 ?>