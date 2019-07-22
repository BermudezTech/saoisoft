<?php 

include '../../conexion.php';
$numero = $_POST['numero'];
for ($i=1; $i <= $numero; $i++) { 

$input = 'nombre' . $i;
$nombre = $_POST[$input];

$st = $conexion -> prepare("INSERT INTO materias (nombre) VALUES ('$nombre')");
$st -> execute();
header('Location: ../');

}


 ?>