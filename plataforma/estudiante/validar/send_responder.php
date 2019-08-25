<?php 
include '../../conexion.php';
$estudiante = $_POST['estudiante'];
$actividad = $_POST['actividad'];
$text = $_POST['text'];
$st = $conexion -> prepare("SELECT * FROM resp_actividad");
$st -> execute();
while ($actividades = $st -> fetch()) {
	$contador = $actividades['id'];
	$contador++;
}
$extension = end(explode(".", $_FILES['archivo']['name']));
$carpeta_destino = "../../usuarios/actividades";
move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino."/resp".$contador.".".$extension);
$archivo = "usuarios/actividades/resp".$contador.".".$extension;
if ($extension == '') {
	$archivo = '';
}
$st1 = $conexion -> prepare("INSERT INTO resp_actividad(actividades, estudiante, url, texto) VALUES ('$actividad', '$estudiante', '$archivo', '$text')");
$st1 -> execute();
$st2 = $conexion -> prepare("SELECT * FROM actividades WHERE id='$actividad'");
$st2 -> execute();
$actividad = $st2 -> fetch();
$curso = $actividad['cursos'];
header ("location: ../curso.php?id=".$curso);
 ?>