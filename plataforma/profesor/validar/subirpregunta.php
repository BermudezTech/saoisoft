<?php 
include '../../conexion.php';
$num = $_POST['num'];
$examen = $_POST['examen'];
if ($_POST['preguntaa'] != "") {
	$pregunta = $_POST['preguntaa'];
	echo $pregunta;
	$tipo = 1;
	$sq = $conexion -> prepare("INSERT INTO question(pregunta, examen, tipo) VALUES ('$pregunta', '$examen', '$tipo')");
	$sq -> execute();
}else{
	$pregunta = $_POST['preguntac'];
	$correcta = $_POST['correcta'];
	$adicional1 = $_POST['adicional1'];
	$adicional2 = $_POST['adicional2'];
	$adicional3 = $_POST['adicional3'];
	$tipo = 2;
	echo $pregunta;
	$sql = "INSERT INTO question(pregunta, examen, tipo) VALUES ('$pregunta', $examen, $tipo)";
	$sq = $conexion -> prepare($sql);
	$sq -> execute();
	echo $sql;
	$sq = $conexion -> prepare("SELECT * FROM question WHERE pregunta='$pregunta'");
	$sq -> execute();
	$pregunta = $sq -> fetch();
	$preguntaid = $pregunta['id'];
	$sq = $conexion -> prepare("INSERT INTO answer(respuesta, question, estado) VALUES ('$correcta', '$preguntaid', 1)");
	$sq -> execute();
	if ($adicional1 != "") {
		$sq = $conexion -> prepare("INSERT INTO answer(respuesta, question, estado) VALUES ('$adicional1', '$preguntaid', 2)");
		$sq -> execute();
	}
	if ($adicional2 != "") {
		$sq = $conexion -> prepare("INSERT INTO answer(respuesta, question, estado) VALUES ('$adicional2', '$preguntaid', 2)");
		$sq -> execute();
	}
	if ($adicional3 != "") {
		$sq = $conexion -> prepare("INSERT INTO answer(respuesta, question, estado) VALUES ('$adicional3', '$preguntaid', 2)");
		$sq -> execute();
	}	
}
$num = $num++;
$location = "location:../nuevo_examen.php?num=".$num;
header($location);


 ?>