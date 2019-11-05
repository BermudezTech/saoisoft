<?php 
include '../../conexion.php';
$finalscore = 0;
session_start();
$idestudiante = $_SESSION['id'];
$examenid = $_REQUEST['examen'];
$st = $conexion -> prepare("SELECT * FROM question WHERE examen='$examenid'");
$st -> execute();
$question = $st -> fetch();
$questionid = $question['id'];
$sql = "SELECT * FROM relestudianteresp WHERE estudiante='$idestudiante' && pregunta='$questionid'";
$st = $conexion -> prepare($sql);
$st -> execute();
$intentos = 0;
while ($relestudianteresp = $st -> fetch()) {
	$intentos++;
}
$intentos = $intentos + 1;
$sql = "SELECT * FROM exam WHERE id = '$examenid'";
$st = $conexion -> prepare($sql);
$st -> execute();
$examen = $st -> fetch();
$maxscore = $examen['maxscore'];
$sql = "SELECT * FROM question WHERE examen = '$examenid'";
$st = $conexion -> prepare($sql);
$st -> execute();
$contador = 1;
while ($preguntas = $st -> fetch()) {
	$contador++;
}
$contador = $contador - 1;
$scoreperquestion = $maxscore/$contador;
$st = $conexion -> prepare($sql);
$st -> execute();

while ($preguntas = $st -> fetch()) {
	$preguntaid = $preguntas['id'];
	$respuestaid = $_POST[$preguntaid];
	//echo $preguntaid;
	//die();
	if ($preguntas['tipo'] == 2) {
		$st2 = $conexion -> prepare("SELECT * FROM answer WHERE id='$respuestaid'");
		$st2 -> execute();
		$respuesta = $st2 -> fetch();
		$estado = 0;
		
		if ($respuesta['estado'] == 1) {
			$finalscore = $finalscore + $scoreperquestion;
			$estado = 1;
		}	
		$st3 = $conexion -> prepare("INSERT INTO relestudianteresp(pregunta, respuestac, estudiante, estado, intento) VALUES ('$preguntaid','$respuestaid','$idestudiante','$estado', '$intentos')");
		$st3 -> execute();
	}else{
		$estado = 2;
		$st3 = $conexion -> prepare("INSERT INTO relestudianteresp(pregunta, respuestaa, estudiante, estado, intento) VALUES ('$preguntaid','$respuestaid','$idestudiante','$estado','$intentos')");
		$st3 -> execute();
	}
}

$st = $conexion -> prepare("INSERT INTO examscores(estudiante, nota, examen) VALUES ('$idestudiante','$finalscore', '$examenid')");
$st -> execute();
echo $finalscore;
$header = 'Location: ../responder_examen.php?examen='.$examenid.'&inicio=2';
header($header);

 ?>