<?php 
include '../../conexion.php';
$examen = $_POST['examen'];
$st = $conexion -> prepare("SELECT * FROM question WHERE examen='$examen'");
$st -> execute();
$contador = 1;
while ($preguntas = $st -> fetch()) {
	$contador++;
}
$num = $contador;
if (isset($_POST['preguntadb'])) {
	if ($_POST['preguntaa'] != "") {
	$pregunta = $_POST['preguntaa'];
	}else{
		$pregunta = $_POST['preguntac'];
	}
	$idpdb = $_POST['preguntadb'];
	$sq = $conexion -> prepare("UPDATE question SET pregunta='$pregunta' WHERE id='$idpdb'");
	$sq -> execute();
	$location = "location:../nuevo_examen.php?examen=".$examen."&num=".$num;
echo $location;
header($location);
die();
}
if ($_POST['preguntaa'] != "") {
	$pregunta = $_POST['preguntaa'];
	echo $pregunta;
	$tipo = 1;
	$sq = $conexion -> prepare("INSERT INTO question(pregunta, examen, tipo) VALUES ('$pregunta', '$examen', '$tipo')");
	$sq -> execute();
}else{
	$pregunta = $_POST['preguntac'];
	if ($pregunta == "") {
$location = "location:../nuevo_examen.php?examen=".$examen."&num=".$num;
echo $location;
header($location);
die();
	}
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
$num = $num+1;
$location = "location:../nuevo_examen.php?examen=".$examen."&num=".$num;
echo $location;
header($location);


 ?>