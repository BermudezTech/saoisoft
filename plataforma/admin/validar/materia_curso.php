<?php 

include '../../conexion.php';

$materia = $_POST['materia'];
$curso = $_POST['curso'];

$st = $conexion -> prepare("SELECT * FROM materias WHERE id='$materia'");
$st -> execute();
$st2 = $conexion -> prepare("SELECT * FROM salon WHERE id='$curso'");
$st2 ->execute();
$materia = $st ->fetch();
$curso = $st2 -> fetch();
$nombre = $materia['nombre']." ".$curso['nombre'];
echo $nombre;
$materia = $materia['id'];
$curso = $curso['id'];

$st3 = $conexion -> prepare("INSERT INTO cursos(nombre,materia,salon) VALUES ('$nombre','$materia','$curso')");
$st3 -> execute();
header('Location: ../');
 ?>