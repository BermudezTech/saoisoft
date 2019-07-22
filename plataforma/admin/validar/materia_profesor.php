<?php 

include '../../conexion.php';

$materia = $_POST['cursos'];
$cursos = explode(",", $materia);
$numero = count($cursos) - 1;
$profesor = $_POST['profesor'];
for ($i=0; $i < $numero; $i++) { 
	$materia = $cursos[$i];
	echo "<br>";
$st = $conexion -> prepare("SELECT * FROM cursos WHERE id='$materia'");
$st -> execute();
$st2 = $conexion -> prepare("SELECT * FROM usuario WHERE id='$profesor'");
$st2 -> execute();
$materia = $st -> fetch();
$profesor = $st2 -> fetch();
echo $profesor['nombres']." ".$profesor['apellidos']." -> ".$materia['nombre'];
$materia = $materia['id'];
$profesor = $profesor['id'];

$st3 = $conexion -> prepare("INSERT INTO relprofesorcursos(profesor, cursos) VALUES ('$profesor', '$materia')");
$st3 -> execute();
}

header('Location: ../');
 ?>