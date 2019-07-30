<?php 
include '../../conexion.php';
$curso = $_POST['curso'];
$actividadid = $_POST['idactividad'];
$contador = $_POST['contador'];
for ($i=1; $i <=$contador ; $i++) { 
	$usuario = "id" . $i;
	$dato = "nota" . $i;
	$dato = $_POST[$dato];
	$salon = "salon" . $i;
	$usuario = $_POST[$usuario];
	$salon = $_POST[$salon];
	$contador2 = 0;
	$sq1 = $conexion -> prepare("SELECT * FROM calificaciones WHERE curso='$curso' && actividad='$actividadid'");
	$sq1 -> execute();
	while ($consulta = $sq1 -> fetch()) {
		if ($consulta['estudiante'] == $usuario) {
			$contador2 = 1;
		}
	}
	if ($contador2 == 1) {
		$sql = "UPDATE calificaciones SET nota='$dato' WHERE estudiante='$usuario' && actividad='$actividadid'";
		$sq = $conexion -> prepare($sql);
		$sq -> execute();
	}else{
		$sql = "INSERT INTO calificaciones(estudiante, curso, nota, actividad) VALUES ('$usuario','$curso','$dato','$actividadid')";
		$sq = $conexion -> prepare($sql);
		$sq -> execute();
	}
	echo $sql . ";<br>";
}
$location = "Location: ../curso.php?id=".$curso;
header($location);


 ?>