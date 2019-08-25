<?php 
include '../../conexion.php';
$curso = $_POST['curso'];
$actividadid = $_POST['actividad'];
$estudiante = $_POST['estudiante'];
$nota = $_POST['nota'];
$sq = $conexion -> prepare("SELECT * FROM calificaciones");
$sq -> execute();
$sql = "INSERT INTO calificaciones(estudiante,curso,actividad, nota) VALUES ('$estudiante','$curso','$actividadid', '$nota')";
while ($calificacion = $sq -> fetch()) {
	if ($calificacion['estudiante'] == $estudiante && $calificacion['curso'] == $curso && $calificacion['actividad'] == $actividadid) {
		$sql = "UPDATE calificaciones SET nota='$nota' WHERE estudiante='$estudiante' && curso='$curso' && actividad='$actividadid'";
	}
}
$sq2 = $conexion -> prepare($sql);
$sq2 -> execute();
header('Location: ../curso.php?id='.$curso);
 ?>